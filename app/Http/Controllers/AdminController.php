<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $galleryCount = GalleryItem::count();
        $portfolioCount = PortfolioItem::count();
        $submissionsCount = \App\Models\ContactSubmission::count();
        return view('admin.dashboard', compact('galleryCount', 'portfolioCount', 'submissionsCount'));
    }

    public function gallery()
    {
        $galleryItems = GalleryItem::orderBy('sort_order')->get();
        return view('admin.gallery', compact('galleryItems'));
    }

    public function storeGallery(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'media_type' => 'required|in:image,video',
            'aspect_ratio' => 'required|in:16-9,9-16',
            'sort_order' => 'required|integer',
            'media_file' => 'required|file',
        ]);

        $path = $request->file('media_file')->store('gallery', 'public');
        $data['media_url'] = $path;
        unset($data['media_file']);

        GalleryItem::create($data);
        return back()->with('success', 'Gallery item added!');
    }

    public function deleteGallery($id)
    {
        $item = GalleryItem::findOrFail($id);
        if (Storage::disk('public')->exists($item->media_url)) {
            Storage::disk('public')->delete($item->media_url);
        }
        $item->delete();
        return back()->with('success', 'Gallery item deleted!');
    }

    public function portfolio()
    {
        $portfolioItems = PortfolioItem::orderBy('sort_order')->get();
        return view('admin.portfolio', compact('portfolioItems'));
    }

    public function storePortfolio(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'location' => 'required|string',
            'sort_order' => 'required|integer',
            'image_file' => 'required|image',
        ]);

        $path = $request->file('image_file')->store('portfolio', 'public');
        $data['image_url'] = $path;
        unset($data['image_file']);

        PortfolioItem::create($data);
        return back()->with('success', 'Portfolio item added!');
    }

    public function deletePortfolio($id)
    {
        $item = PortfolioItem::findOrFail($id);
        if (Storage::disk('public')->exists($item->image_url)) {
            Storage::disk('public')->delete($item->image_url);
        }
        $item->delete();
        return back()->with('success', 'Portfolio item deleted!');
    }

    public function submissions()
    {
        $submissions = \App\Models\ContactSubmission::orderBy('created_at', 'desc')->get();
        return view('admin.submissions', compact('submissions'));
    }
}
