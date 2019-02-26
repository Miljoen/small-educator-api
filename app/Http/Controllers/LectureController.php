<?php

namespace App\Http\Controllers;

use App\Lecture;
use Illuminate\View\View;
use SimpleXMLElement;

class LectureController extends Controller
{
    public function index(): View
    {
        $lectures = Lecture::query()->with('slides')
            ->get();

        $xmlElement = new SimpleXMLElement('<rootTag/>');
        $xmlLectures = $this->toXML($xmlElement, $lectures->toArray());

        return view('lecture.index', compact('xmlLectures'));
    }

    public function show(int $id): View
    {
        $lecture = Lecture::where('id', $id)->with('slides')
            ->get();

        $xmlElement = new SimpleXMLElement('<rootTag/>');
        $xmlLecture = $this->toXML($xmlElement, $lecture->toArray());

        return view('lecture.show', compact('xmlLecture'));
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
