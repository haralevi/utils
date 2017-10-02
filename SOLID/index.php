<?php

/*
    S - Single-responsibility principle:
        A class should have one and only one reason to change,
        meaning that a class should have only one job.

    O - Open-closed principle:
        Objects or entities should be open for extension, but closed for modification.
        A class should be easily extendable without modifying the class itself.

    L - Liskov substitution principle:
        All this is stating is that every subclass/derived class should be substitutable for their base/parent class.

    I - Interface segregation principle:
        A client should never be forced to implement an interface that it doesn't use
        or clients shouldn't be forced to depend on methods they do not use.

    D - Dependency Inversion Principle:
        Entities must depend on abstractions not on concretions.
        It states that the high level module must not depend on the low level module,
        but they should depend on abstractions.
*/

interface ShapeInterface
{
    public function area();
}

interface SolidShapeInterface
{
    public function volume();
}

interface ManageShapeInterface
{
    public function manage();
}

class Circle implements ShapeInterface
{
    public $radius;

    /**
     * Circle constructor.
     * @param int $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return float|int
     */
    public function area()
    {
        return pi() * pow($this->radius, 2);
    }
}

class Square implements ShapeInterface, ManageShapeInterface
{
    public $length;

    /**
     * Square constructor.
     * @param int $length
     */
    public function __construct($length)
    {
        $this->length = $length;
    }

    /**
     * @return float|int
     */
    public function area()
    {
        return pow($this->length, 2);
    }

    public function manage()
    {
        return $this->area();
    }
}

class Cuboid implements ShapeInterface, SolidShapeInterface, ManageShapeInterface
{

    public $width;
    public $height;
    public $depth;

    /**
     * Cuboid constructor.
     * @param int $width
     * @param int $height
     * @param int $depth
     */
    public function __construct($width, $height, $depth)
    {
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
    }

    /**
     * @return int
     */
    public function area()
    {
        // calculate the surface area of the cuboid
        $area = 0;
        $area += 2 * $this->width * $this->height;
        $area += 2 * $this->width * $this->depth;
        $area += 2 * $this->height * $this->depth;
        return $area;
    }

    /**
     * @return int
     */
    public function volume()
    {
        // calculate the volume of the cuboid
        return $this->width * $this->height * $this->depth;
    }

    public function manage()
    {
        return $this->area() + $this->volume();
    }
}

class AreaCalculator
{
    protected $shapes;

    /**
     * AreaCalculator constructor.
     * @param ShapeInterface[] $shapes
     */
    public function __construct($shapes = array())
    {
        $this->shapes = $shapes;
    }

    /**
     * @return float|int
     */
    public function sum()
    {
        $area = array();

        foreach ($this->shapes as $shape) {
            if ($shape instanceof ShapeInterface) {
                $area[] = $shape->area();
                continue;
            } else {
                throw new \DomainException('Bad Shape type');
            }
        }

        return array_sum($area);
    }
}

class VolumeCalculator extends AreaCalculator
{
    /**
     * @param SolidShapeInterface[] $shapes
     */
    public function __construct($shapes = array())
    {
        parent::__construct($shapes);
    }

    /**
     * @return float|int
     */
    public function sum()
    {
        $volume = array();

        foreach ($this->shapes as $shape) {
            if ($shape instanceof SolidShapeInterface) {
                $volume[] = $shape->volume();
                continue;
            } else {
                throw new \DomainException('Bad Shape type');
            }
        }

        return array_sum($volume);
    }
}

class SumCalculatorOutputter
{
    /**
     * @var AreaCalculator
     */
    protected $calculator;

    /**
     * SumCalculatorOutputter constructor.
     * @param AreaCalculator $calculator
     */
    public function __construct(AreaCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @return string
     */
    public function JSON()
    {
        $data = array(
            'sum' => $this->calculator->sum()
        );

        return json_encode($data);
    }

    /**
     * @return string
     */
    public function HTML()
    {
        if($this->calculator instanceof VolumeCalculator)
            $shape_sum_type = 'volumes';
        else if($this->calculator instanceof AreaCalculator)
            $shape_sum_type = 'areas';
        else
            throw new \DomainException('Bad Shape\'s Calculator type');

        return $sum = implode('', array(
            'Sum of the ' . $shape_sum_type . ' of provided shapes: ',
            '<b>',
            $this->calculator->sum(),
            '</b>'
        ));
    }
}

$shapes = array(
    new Circle(2),
    new Square(5),
    new Square(6),
);

$areas = new AreaCalculator($shapes);

$areas_sum_output = new SumCalculatorOutputter($areas);
echo $areas_sum_output->HTML();
echo $areas_sum_output->JSON();

$solidShapes = array(
    new Cuboid(1, 2, 3),
    new Cuboid(2, 3, 4),
);

$volumes = new VolumeCalculator($solidShapes);

$volumes_sum_output = new SumCalculatorOutputter($volumes);
echo $areas_sum_output->HTML();
echo $areas_sum_output->JSON();