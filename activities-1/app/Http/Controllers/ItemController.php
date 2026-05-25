<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $items = [
        ['id'=>1,'student_name'=>'Juan Dela Cruz','course'=>'BSIT','year_level'=>'2nd Year','gpa'=>'1.75'],
        ['id'=>2,'student_name'=>'Maria Santos','course'=>'BSBA','year_level'=>'3rd Year','gpa'=>'1.50'],
        ['id'=>3,'student_name'=>'Carlos Reyes','course'=>'BSEd','year_level'=>'1st Year','gpa'=>'2.00'],
        ['id'=>4,'student_name'=>'Ana Lopez','course'=>'BSN','year_level'=>'4th Year','gpa'=>'1.25'],
        ['id'=>5,'student_name'=>'Mark Ramos','course'=>'BSCS','year_level'=>'2nd Year','gpa'=>'1.80'],
    ];

    // READ ALL
    public function index()
    {
        $items = session('items', $this->items);
        return view('items.index', compact('items'));
    }

    // CREATE FORM
    public function create()
    {
        return view('items.create');
    }

    // STORE NEW
    public function store(Request $request)
    {
        $items = session('items', $this->items);

        $newItem = [
            'id' => count($items) + 1,
            'student_name' => $request->student_name,
            'course' => $request->course,
            'year_level' => $request->year_level,
            'gpa' => $request->gpa
        ];

        $items[] = $newItem;
        session(['items' => $items]);

        return redirect('/items');
    }

    // SHOW ONE
    public function show($id)
    {
        $items = session('items', $this->items);
        $item = collect($items)->firstWhere('id', $id);

        return view('items.show', compact('item'));
    }

    // EDIT FORM
    public function edit($id)
    {
        $items = session('items', $this->items);
        $item = collect($items)->firstWhere('id', $id);

        return view('items.edit', compact('item'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $items = session('items', $this->items);

        foreach ($items as &$item) {
            if ($item['id'] == $id) {
                $item['student_name'] = $request->student_name;
                $item['course'] = $request->course;
                $item['year_level'] = $request->year_level;
                $item['gpa'] = $request->gpa;
            }
        }

        session(['items' => $items]);

        return redirect('/items');
    }

    // DELETE
    public function destroy($id)
    {
        $items = session('items', $this->items);

        $items = array_filter($items, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        session(['items' => array_values($items)]);

        return redirect('/items');
    }
}