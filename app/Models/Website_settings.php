<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website_settings extends Model
{
protected $fillable = [
    'logo', 'logo_dark', 'tagline', 'tagline_h', 'tagline_p', 
    'about_us_img1', 'about_us_img2', 'what_we_build', 
    'why_dev_home', 'how_we_work', 'footer_des', 
    'hero_svg1', 'hero_svg2', 'hero_svg3', 'hero_svg4'
];
}
