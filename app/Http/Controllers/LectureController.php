<?php

namespace App\Http\Controllers;

use App\Lecture;
use Illuminate\View\View;
use Spatie\ArrayToXml\ArrayToXml;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::query()->with('slides')
            ->first();
        $lecturesArray = (['SmallEducator' => $lectures->toArray()]);

        $xmlLectures = ArrayToXml::convert($lecturesArray);

        return response()->xml($xmlLectures);
    }

    public function show(int $id): View
    {
        $lecture = Lecture::where('id', $id)->with('slides')
            ->get();

        $xmlElement = new SimpleXMLElement('<rootTag/>');
        $xmlLecture = $this->toXML($xmlElement, $lecture->toArray());

        return view('lecture.show', compact('xmlLecture'));
    }

    /** TODO: Refactor xml responses */
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
