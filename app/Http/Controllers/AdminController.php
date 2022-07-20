<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Library;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use App\Notifications\ContactNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Notification;
use PhpParser\Node\Expr\FuncCall;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use DataTables;
use SebastianBergmann\Template\Template;
use Svg\Tag\Rect;

class AdminController extends Controller
{

    public function category()
    {
        return view('admin.category');
    }


    // public function fetchcategory(Request $request)
    // {
    //     $category = Category::all();
    //     // if($request->ajax()){
    //     //     return DataTables::of($category);
    //     // }
    //     return response()->json([
    //         'category' => $category
    //     ]);
    // }

    public function fetchcategory(Request $request){
        $category = Category::get();
        if ($request->ajax()) {
            $allData = DataTables::of($category)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" value=""  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm p-2 fs-3 fw-bold category_delete"><i class="las la-trash-alt"></i>Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            return $allData;
        }
        return view('admin.category', compact('category'));
    }


    public function add_category(Request $request)
    {
        $category = new Category();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:252'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages()
            ]);
        } else {
            $category->category_name = $request->name;
            $category->save();
            return response()->json([
                'status' => 200,
                'message' => 'Category added successfully'
            ]);
        }
    }

    public function category_delete($id)
    {
        $product = category::find($id);
        $product->delete();
        return response()->json([
            'states' => 200,
            'message' => "Category deleted successfully"
        ]);
    }




    public function product()
    {
        $category = Category::all();
        return view('admin.products', compact('category'));
    }

    public function product_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages(),
            ]);
        } else {
            $product = new Product();
            $product->title = $request->title;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;
            $product->author = $request->author;
            if ($request->hasFile('image')) {
                $productImage = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('product_image'), $productImage);
                $product->image = $productImage;
            }
            $product->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product added successfully',
            ]);
        }
    }

    // public function fetchproducts()
    // {
    //     // $category = Category::all();
    //     $product = Product::all();
    //     return response()->json([
    //         'product' => $product,
    //         // 'category'=>$category,
    //     ]);
    // }
    public function fetchproducts(Request $request){
        $product = Product::get();
        if ($request->ajax()) {
            $allData = DataTables::of($product)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-info px-3 py-2 fw-bold fs-3 btn-sm edit_button">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger px-3 py-2 fw-bold fs-3 delete_button">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            return $allData;
        }
        return view('admin.products', compact('product'));
    }

    public function edit_products($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 200,
                'product' => $product
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => "Product not found"
            ]);
        }
    }

    public function update_products($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ed_title' => 'required',
            'ed_price' => 'required',
            'ed_quantity' => 'required',
            'ed_category' => 'required',
            'ed_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ed_author' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages()
            ]);
        } else {

            $product = Product::find($id);

            if ($product) {
                $product->title = $request->ed_title;
                $product->price = $request->ed_price;
                $product->quantity = $request->ed_quantity;
                $product->category = $request->ed_quantity;
                $product->author = $request->ed_author;
                if ($request->hasFile('image')) {
                    $path = '/product_image/' . $product->image;
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $productImage = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('product_image'), $productImage);
                    $product->image = $productImage;
                }
                $product->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Product updated successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "Product can't update"
                ]);
            }
        }
    }

    public function delete_products($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Product delete is successfully'
        ]);
    }

    public function blog()
    {
        // $blog = BLog::all();
        return view('admin.blogs');
    }

    public function add_blogs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages()
            ]);
        } else {
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->content = $request->content;
            if ($request->hasFile('image')) {
                $blogImage = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('blog_image'),$blogImage);
                $blog->image = $blogImage;
            }
            $blog->save();
            return response()->json([
                'status' => 200,
                'message' => 'Blog Add successfully'
            ]);
        }
    }
    public function fetchBlog(){
        $blog = Blog::all();
        return response()->json([
            'blog'=>$blog
        ]);
    }

    public function edit_blog($id){
        $blog = Blog::find($id);
        if($blog){
            return response()->json([
                'status' => 200,
                'blog'=>$blog,
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Blog not found',
            ]);
        }
    }
    public function update_blog($id, Request $request){
        $validator = Validator::make($request->all(), [
            'ed_title' => 'required',
            'ed_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ed_content' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'message' => $validator->messages()
            ]);
        }else{
            $blog = Blog::find($id);
            if($blog){
                $blog->title = $request->ed_title;
                $blog->content = $request->ed_content;

                if($request->hasFile('ed_image')){
                    $path = '/blog_image/' . $blog->image;
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                    $blogImage = date('YmdHis') . "." . request()->ed_image->getClientOriginalExtension();
                    request()->ed_image->move(public_path('blog_image'),$blogImage);
                    $blog->image = $blogImage;
                }
                $blog->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Product updated successfully',
                ]);

            }else{
                return response()->json([
                    'status' => 404,
                    'message' => "product can't update",
                ]);
            }
        }
    }
    public function delete_blog($id){
        $blog  = Blog::find($id);
        $blog->delete();
        return response()->json([
            'status' => 200,
            'message' => 'blog delete is successfully'
        ]);
    }

    // Library Admin

    public function library(){
        // $category = Category::all();
        $library = Library::latest()->paginate(3);
        return view('admin.library' , compact( 'library'));
    }
    // required|mimes:pdf,xlx,csv|max:2048
    public function library_add(){
        $category = Category::all();
        return view('admin.addlibarary', compact('category'));

    }

    public function ad_library(Request $request){

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'published_years' => 'required',
            'label' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
        ]);
        // dd($request->all());
        $library = new Library();
        $library->title = $request->title;
        $library->author = $request->author;
        $library->category = $request->category;
        $library->published_years = $request->published_years;
        $library->label = $request->label;
        $imageName = date('YmdHis'). "." .request()->image->getClientOriginalExtension();
        request()->image->move(public_path('library_image'), $imageName);
        $library->image = $imageName;
        $pdfName = date('YmdHis'). "." .request()->pdf->getClientOriginalExtension();
        request()->pdf->move(public_path('library_pdf'), $pdfName);
        $library->pdf = $pdfName;

        $library->save();

        return redirect()->back()->with('success', 'book added successfully');


    }

    public function ed_library($id){

        $library = Library::find($id);
        $category = Category::all();
        return view('admin.editlibrary', compact('library' , 'category'));

    }

    public function library_ed($id , Request $request){
        $library = Library::find($id);
        $library->title = $request->title;
        $library->author = $request->author;
        $library->category = $request->category;
        $library->published_years = $request->published_years;
        $library->label = $request->label;
        $imageName = date('YmdHis'). "." .request()->image->getClientOriginalExtension();
        request()->image->move(public_path('library_image'), $imageName);
        $library->image = $imageName;
        $pdfName = date('YmdHis'). "." .request()->pdf->getClientOriginalExtension();
        request()->pdf->move(public_path('library_pdf'), $pdfName);
        $library->pdf = $pdfName;

        $library->save();

        return redirect()->back()->with('success', 'book updated successfully');
    }



    public function library_de($id){
        $library = Library::find($id);
        $library->delete();
        return redirect()->back();
    }


    public function order_view()
    {

        $order = Order::paginate(5);

        return view('admin.orderview', compact('order'));
    }

    public function order_delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'delivered';
        $order->save();
        return redirect()->back();
    }

    public function order_paid($id)
    {
        $order = Order::find($id);
        $order->payment_status = 'paid';
        $order->save();
        return redirect()->back();
    }


    public function email_send_view($id)
    {
        $order = Order::find($id);
        return view('admin.sendemail', compact('order'));
    }

    public function send_user_email($id, Request $request)
    {
        $order = Order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        Notification::send($order, new SendEmailNotification($details));
        return redirect()->back();
    }


    public function view_contact()
    {
        $contact = Contact::paginate(3);
        return view('admin.contact', compact('contact'));
    }

    public function delete_contact($id)
    {
        $contact_de = Contact::find($id);
        $contact_de->delete();
        return redirect()->back();
    }
    public function contact_email_view($id)
    {
        $contact = Contact::find($id);
        return view('admin.contactsendemail', compact('contact'));
    }

    public function contact_email_send($id, Request $request)
    {
        $contact = Contact::find($id);
        $contacts = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        Notification::send($contact, new ContactNotification($contacts));
        return redirect()->back();
    }









    public function search_order(Request $request)
    {
        $searchText = $request->search;
        $order = Order::where('name', 'LIKE', "%$searchText%")->orWhere('email', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "$searchText")
            ->orWhere('product_title', 'LIKE', "%$searchText%")->paginate(5);
        return view('admin.orderview', compact('order'));
    }

    public function print_pdf($id)
    {
        $blog = Blog::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('blog'));
        return $pdf->download('blog.pdf');
    }

    public function print_word($id)
    {
        $blog = Blog::find($id);
        $word = new PhpWord();
        $section = $word->addSection();
        $section->addText($blog->title);

        $wordWriter = IOFactory::createWriter($word, 'Word2007');
        $wordWriter->save('blog.docx');
        return response()->download(public_path('blog.docx'));
    }
}
