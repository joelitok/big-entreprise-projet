<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Visitor;
use App\Cart;
use App\Models\Parametrage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ShopFullV extends Component
{
  public $selectedCategory;
  public $search;
  public $selectedMaxPrice;
  public $selectedMinPrice;
  public $hidden = false;
  public $searchByCategory;



  public function visitors(String $page)
  {
    //get news visitor in my website;
    $geoipInfo = geoip()->getClientIP();
    $new_visitor = new Visitor();
    $new_visitor->page = $page;
    $new_visitor->visitor_ip_address = $geoipInfo;
    $new_visitor->save();
    //get news visitor in my website;
  }

  public function render()
  {

    //$this->visitors('Boutique');

    if (request()->is('shop-full-v/*')) {
      $ValueCategory = 0;
      $ValueCategory = Str::of(request()->path())->basename();
      $this->selectedCategory = $ValueCategory;
      $this->hidden = true;

      //dd(request()->is('shop-full-v/'.$this->searchByCategory));
    }
    //dd(request()->get('search'));

    if (request()->has('search')) {
      $ValueSearch = '';
      $ValueSearch = request()->has('search') ? request()->get('search') : '';
      $this->search = $ValueSearch;
      //dd($ValueSearch);
      //$this->hidden=true;
    }


    $max_price = Product::orderBy('id', 'DESC')->where('product_status', 1)
      ->max('product_price');
    $min_price = Product::orderBy('id', 'DESC')->where('product_status', 1)
      ->min('product_price');


    $products = Product::orderBy('id', 'DESC')
      ->where('product_status', 1)

      // affichage des produire en fonction des catégories
      ->when($this->selectedCategory, function ($query, $selectedCategory) {
        $this->hidden = true;
        return $query->where('product_category', $selectedCategory);
      })->when($this->selectedMinPrice, function ($query, $selectedMinPrice) {
        $this->hidden = true;
        return $query->where('product_price', '>', $selectedMinPrice)
          ->orWhere('product_price', $selectedMinPrice);;
      })->when($this->selectedMaxPrice, function ($query, $selectedMaxPrice) {
        $this->hidden = true;
        return $query->where('product_price', '<', $selectedMaxPrice)
          ->orWhere('product_price', $selectedMaxPrice);
      })->when($this->search, function ($query, $search) {
        //'like','%'. $selectedClass.'%'

        $this->hidden = true;
        //dd($search);
        return $query->where('product_name', 'like', '%' . $search . '%');
      })->get();

    $prodcts = Product::orderBy('id', 'DESC')
      ->where('product_status', 1)->first();






    return view('livewire.shop-full-v')->with('products', $products)
      ->with('hidden', $this->hidden)
      ->with('max_price', $max_price)
      ->with('min_price', $min_price);
  }
}
