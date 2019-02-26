<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\View\View;
use SimpleXMLElement;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::query()->with('lectures')
            ->get();

        $xmlElement = new SimpleXMLElement('<rootTag/>');
        $xmlCourses = $this->toXML($xmlElement, $courses->toArray());

        return view('course.index', compact('xmlCourses'));
    }

    public function show(int $id): View
    {
        $course = Course::where('id', $id)->with('lectures')
            ->get();

        $xmlElement = new SimpleXMLElement('<rootTag/>');
        $xmlCourse = $this->to_xml($xmlElement, $course->toArray());

        return view('course.show', compact('xmlCourse'));
    }

    function toXML(SimpleXMLElement $object, array $data): SimpleXMLElement
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $new_object = $object->addChild($key);
                $this->toXML($new_object, $value);
            } else {
                if ($key == (int) $key) {
                    $key = "key_$key";
                }

                $object->addChild($key, $value);
            }
        }
        return $object;
    }
}
