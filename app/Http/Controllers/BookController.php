<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use DataTables;
use Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::latest()->get();

        if ($request->ajax()) {
            return Datatables::of($books)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('books', compact('books'));
    }

    /**
     * Store/update resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $this->validate($request,[
            'name'=>'required|alpha|min:3|max:50',
            'firstname'=>'required|alpha|min:3|max:30',
            'secondname'=>'required|alpha|min:3|max:30',
           'curp'=>'required|alpha_num|size:18',
           'boleta'=>'required|numeric|digits:10',
        ]);

        Book::updateOrCreate([
            'id' => $request->book_id
        ],[
            'name' => $request->name,
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'curp' => $request->curp,
            'boleta' => $request->boleta,
            'status' => $request->status,
        ]);

        // return response
        $response = [
            'success' => true,
            'message' => 'Book saved successfully.',
        ];

         Session::flash('succes', 'Se ha registrado su pagina con exito');
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Book $books
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        // return response
        $response = [
            'success' => true,
            'message' => 'Book deleted successfully.',
        ];
        return response()->json($response, 200);
    }
}
