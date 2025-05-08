<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\FooterResource;
use App\Http\Resources\HeroSectionResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\testimonialsResource;
use App\Http\Resources\TourResource;
use App\Models\About;
use App\Models\Footer;
use App\Models\HeroSection;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * get home page data
     * @return \Iluminate\Http\JsonResponse
     */

    public function index()
    {
        //pagination
        $heroSection = HeroSectionResource::collection(HeroSection::paginate(4));
        $tours= TourResource::collection(Tour::paginate(3));
        $services= ServiceResource::collection(Service::paginate(3));
        $testimonials= testimonialsResource::collection(Testimonial::paginate(3));
        $about= AboutResource::collection(About::paginate(3));
        $footer= FooterResource::collection(Footer::paginate(3));
        $data = [
            'heroSection'  => $heroSection,
            'tours'        => $tours,
            'services'     => $services,
            'testimonials' => $testimonials,
            'about'        => $about,
            'footer'       => $footer
        ];

        return response()->json(['data' => $data],200);
    }

 }
