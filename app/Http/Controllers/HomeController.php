<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Library;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;
use League\CommonMark\Node\Query\OrExpr;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        $blog = Blog::all();
        return view('userpage.home', compact('product', 'blog'));
    }

    public function redrice()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '0') {

            $product = Product::all();
            $blog = Blog::all();

            return view('userpage.home', compact('product', 'blog'));
        } else {
            $userData = User::select(DB::raw("COUNT(*) as count "))
                ->whereYear("created_at", date("Y"))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
            // dd($userData);
            $total_product = Product::all()->count();
            // $total_order = Order::all()->count();
            $total_user = User::all()->count();
            // $order = Order::all();
            // $total_revenue = 0;
            // foreach ($order as $orders) {
            //     $total_revenue = $total_revenue + $orders->price;
            // }
            $total_blog = Blog::all()->count();
            $total_library = Library::all()->count();
            $total_contact = Contact::all()->count();
            return view('admin.dashboard', compact('userData', 'total_product', 'total_blog', 'total_library', 'total_contact', 'total_user'));
        }
    }

    public function card_add($id, Request $request)
    {
        if (Auth::id()) {

            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price * $request->quantity;
            $cart->quantity = $request->quantity;
            $cart->image = $product->image;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function card_view()
    {
        if (Auth::id()) {

            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('userpage.carts', compact('cart'));
        } else {
            return redirect('/login');
        }
    }

    public function card_remove($id)
    {
        $remove_card = Cart::find($id);
        $remove_card->delete();
        return redirect()->back()->with('delete', 'Cart removed successfully');
    }

    public function user_order_view()
    {
        return view('userpage.order');
    }

    public function user_order(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $data = Cart::where('user_id', '=', $user_id)->get();
        $request->validate([
            'slip' => 'required'
        ]);
        $imageslip = date('YmdHis') . "." . $request->slip->getClientOriginalExtension();
        request()->slip->move(public_path('slip_image'), $imageslip);

        foreach ($data as $datas) {

            $order = new Order();

            $order->name = $datas->name;
            $order->email = $datas->email;
            $order->phone = $datas->phone;
            $order->address = $datas->address;
            $order->user_id = $datas->user_id;

            $order->product_title = $datas->product_title;
            $order->quantity = $datas->quantity;
            $order->price = $datas->price;
            $order->image = $datas->image;
            $order->product_id = $datas->product_id;

            $order->slip = $imageslip;
            $order->payment_status = 'cashing';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $datas->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('order', 'Order was successfully! Please waitting our reply');
    }


    public function user_order_lose()
    {
        return view('userpage.orderlose');
    }

    public function user_order_end()
    {
        return view('userpage.orderend');
    }

    public function user_contact_up(Request $request)
    {

        $contact = new Contact();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required'
        ]);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->message = $request->message;
        if (Auth::id()) {
            $contact->user_id = Auth::user()->id;
        }
        $contact->save();
        return redirect()->back()->with('contact', 'Your contact was successfully');
    }

    public function user_about()
    {
        return view('userpage.about');
    }

    public function user_shop()
    {
        $product = Product::all();
        return view('userpage.shop', compact('product'));
    }

    public function user_blog()
    {
        $blog = Blog::all();
        return view('userpage.blog', compact('blog'));
    }

    public function user_contact()
    {
        return view('userpage.contact');
    }

    public function user_home_blog($id)
    {
        $blog = Blog::find($id);
        return view('userpage.blogidview', compact('blog'));
    }

    public function library_page()
    {
        $library = Library::all();
        return view('userpage.library', compact('library'));
    }

    public function library_detail($id)
    {

        $library = Library::find($id);
        $library_com = $library->comments;
        // $comment = Comment::with('library')->get();
        return view('userpage.librarydetail', compact('library', 'library_com'));
    }

    public function fetch_comment()
    {
        $comment = Comment::all();
        return response()->json([
            'comment' => $comment
        ]);
    }

    public function music_and_arts()
    {
        $library = Library::all();
        return view('userpage.musicandart', compact('library'));
    }

    public function biography()
    {
        $library = Library::all();
        return view('userpage.biography', compact('library'));
    }

    public function cooking()
    {
        $library = Library::all();
        return view('userpage.cooking', compact('library'));
    }

    public function library_comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'library_id' => 'required',
            'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages()
            ]);
        } else {
            $name = Auth::user()->name;
            $comment = new Comment();
            $comment->library_id = $request->library_id;
            $comment->name = $name;
            $comment->comment = $request->comment;
            $comment->save();
            return response()->json([
                'status' => 200,
                'message' => 'Your review is succesfully'
            ]);
        }
    }

    // public function view_comment(Comment $comment){
    //     dd($comment);
    // }

    // For Search
    public function search(Request $request)
    {
        $output = '';
        $library = Library::where('title', 'Like', '%' . $request->search . '%')
            ->orWhere('category', 'Like', '%' . $request->search . '%')
            ->orWhere('author', 'Like', '%' . $request->search . '%')
            ->get();
        foreach ($library as $library) {
            if ($library->category == 'Music and Art') {
                $output .= '
                <div class="card col-md-2">
                    <h3>' . $library->title . '</h3>
                    <a href="' . url('/library_detail', $library->id) . '">
                        <img src="/library_image/' . $library->image . '" class="card-img" alt="">
                    </a>
                    <p>
                        ' . $library->published_years . '
                    </p>
                    <p>
                        ' . $library->author . '
                    </p>
                </div>
            ';
            }
        }
        return response($output);
    }

    public function biosearch(Request $request)
    {
        $output = '';
        $library = Library::where('title', 'Like', '%' . $request->search . '%')
            ->orWhere('category', 'Like', '%' . $request->search . '%')
            ->orWhere('author', 'Like', '%' . $request->search . '%')
            ->get();
        foreach ($library as $library) {
            if ($library->category == 'Biography') {
                $output .= '
                <div class="card col-md-2">
                    <h3>' . $library->title . '</h3>
                    <a href="' . url('/library_detail', $library->id) . '">
                        <img src="/library_image/' . $library->image . '" class="card-img" alt="">
                    </a>
                    <p>
                        ' . $library->published_years . '
                    </p>
                    <p>
                        ' . $library->author . '
                    </p>
                </div>
            ';
            }
        }
        return response($output);
    }

    public function cookingsearch(Request $request)
    {
        $output = '';
        $library = Library::where('title', 'Like', '%' . $request->search . '%')
            ->orWhere('category', 'Like', '%' . $request->search . '%')
            ->orWhere('author', 'Like', '%' . $request->search . '%')
            ->get();
        foreach ($library as $library) {
            if ($library->category == 'Cooking') {
                $output .= '
                <div class="card col-md-2">
                    <h3>' . $library->title . '</h3>
                    <a href="' . url('/library_detail', $library->id) . '">
                        <img src="/library_image/' . $library->image . '" class="card-img" alt="">
                    </a>
                    <p>
                        ' . $library->published_years . '
                    </p>
                    <p>
                        ' . $library->author . '
                    </p>
                </div>
            ';
            }
        }
        return response($output);
    }
}
