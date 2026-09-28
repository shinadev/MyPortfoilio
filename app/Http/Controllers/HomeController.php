<?php

namespace App\Http\Controllers;

use App\about;
use App\blog;
use App\contact;
use App\experience;
use App\project;
use App\service;
use App\skill;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use UploadTrait;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */


public function index()
{
    $projects = project::count();
    $blogs = blog::count();
    $services = service::count();
    $skills = skill::count();
    $experiences = experience::count();
    $contacts = contact::count();

    $recentProjects = project::latest('project_id')
        ->take(5)
        ->get();

    $recentBlogs = blog::latest('blog_id')
        ->take(5)
        ->get();

    return view('admin.dashboard', compact(
        'projects',
        'blogs',
        'services',
        'skills',
        'experiences',
        'contacts',
        'recentProjects',
        'recentBlogs'
    ));
}




    /*
    |--------------------------------------------------------------------------
    | About
    |--------------------------------------------------------------------------
    */

    public function aboutview()
    {
        $select = about::all();

        return view('admin.about', [
            'about' => $select
        ]);
    }

    public function updateabout(Request $request)
    {
        $nu = 1;

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $image = $request->file('image');

            $imageName = time() . '_' .
                Str::slug(
                    pathinfo(
                        $image->getClientOriginalName(),
                        PATHINFO_FILENAME
                    )
                ) . '.' .
                $image->getClientOriginalExtension();

            $uploadPath = public_path('uploads/about');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move($uploadPath, $imageName);

            DB::update(
                'UPDATE abouts SET image=? WHERE about_id=?',
                [
                    'uploads/about/' . $imageName,
                    $nu
                ]
            );

            return redirect('/admin/about')
                ->with('success', 'Profile image updated successfully.');
        }

        switch ($request->up) {

            case 'a':
                DB::update(
                    'UPDATE abouts SET fname=? WHERE about_id=?',
                    [$request->fname, $nu]
                );
                break;

            case 'b':
                DB::update(
                    'UPDATE abouts SET mname=? WHERE about_id=?',
                    [$request->mname, $nu]
                );
                break;

            case 'c':
                DB::update(
                    'UPDATE abouts SET lname=? WHERE about_id=?',
                    [$request->lname, $nu]
                );
                break;

            case 'd':
                DB::update(
                    'UPDATE abouts SET descr=? WHERE about_id=?',
                    [$request->descr, $nu]
                );
                break;

            case 'e':
                DB::update(
                    'UPDATE abouts SET birthday=? WHERE about_id=?',
                    [$request->birthday, $nu]
                );
                break;

            case 'f':
                DB::update(
                    'UPDATE abouts SET age=? WHERE about_id=?',
                    [$request->age, $nu]
                );
                break;

            case 'g':
                DB::update(
                    'UPDATE abouts SET email=? WHERE about_id=?',
                    [$request->email, $nu]
                );
                break;

            case 'h':
                DB::update(
                    'UPDATE abouts SET interest=? WHERE about_id=?',
                    [$request->interests, $nu]
                );
                break;

            case 'i':
                DB::update(
                    'UPDATE abouts SET website=? WHERE about_id=?',
                    [$request->website, $nu]
                );
                break;

            case 'j':
                DB::update(
                    'UPDATE abouts SET study=? WHERE about_id=?',
                    [$request->study, $nu]
                );
                break;

            case 'k':
                DB::update(
                    'UPDATE abouts SET twitter=? WHERE about_id=?',
                    [$request->twitter, $nu]
                );
                break;

            case 'l':
                DB::update(
                    'UPDATE abouts SET degree=? WHERE about_id=?',
                    [$request->degree, $nu]
                );
                break;

            case 'm':
                DB::update(
                    'UPDATE abouts SET city=? WHERE about_id=?',
                    [$request->city, $nu]
                );
                break;
        }

        return redirect('/admin/about')
            ->with('success', 'About information updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Skills
    |--------------------------------------------------------------------------
    */

    public function skillview()
    {
        $select = skill::all();

        return view('admin.skills', [
            'skill' => $select
        ]);
    }

    public function updateskill(Request $request)
    {
        $nu = 1;

        switch ($request->up) {

            case 'c':
                DB::update(
                    'UPDATE skills SET css=? WHERE id=?',
                    [$request->css, $nu]
                );
                break;

            case 'j':
                DB::update(
                    'UPDATE skills SET javascript=? WHERE id=?',
                    [$request->javascript, $nu]
                );
                break;

            case 'w':
                DB::update(
                    'UPDATE skills SET wordpress=? WHERE id=?',
                    [$request->wordpress, $nu]
                );
                break;

            case 'p':
                DB::update(
                    'UPDATE skills SET php=? WHERE id=?',
                    [$request->php, $nu]
                );
                break;

            case 'jquery':
                DB::update(
                    'UPDATE skills SET jquery=? WHERE id=?',
                    [$request->jquery, $nu]
                );
                break;

            case 'm':
                DB::update(
                    'UPDATE skills SET mysql=? WHERE id=?',
                    [$request->mysql, $nu]
                );
                break;

            case 'a':
                DB::update(
                    'UPDATE skills SET angular=? WHERE id=?',
                    [$request->angular, $nu]
                );
                break;

            case 'h':
                DB::update(
                    'UPDATE skills SET html=? WHERE id=?',
                    [$request->html, $nu]
                );
                break;
        }

        return redirect('/admin/skills')
            ->with('success', 'Skills updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Experience
    |--------------------------------------------------------------------------
    */

    public function experienceview()
    {
        $select = experience::all();

        return view('admin.experience', [
            'experience' => $select
        ]);
    }

    public function updatexperience(Request $request)
    {
        $nu = 1;
        $nv = 2;
        $nw = 3;
        $nx = 4;

        switch ($request->up) {

            case '1':
                DB::update(
                    'UPDATE experiences
                     SET pos_name=?, pos_company=?, pos_descr=?
                     WHERE experience_id=?',
                    [
                        $request->pos_name,
                        $request->pos_company,
                        $request->pos_descr,
                        $nu
                    ]
                );
                break;

            case '2':
                DB::update(
                    'UPDATE experiences
                     SET pos_name=?, pos_company=?, pos_descr=?
                     WHERE experience_id=?',
                    [
                        $request->pos_name,
                        $request->pos_company,
                        $request->pos_descr,
                        $nv
                    ]
                );
                break;

            case '3':
                DB::update(
                    'UPDATE experiences
                     SET pos_name=?, pos_company=?, pos_descr=?
                     WHERE experience_id=?',
                    [
                        $request->pos_name,
                        $request->pos_company,
                        $request->pos_descr,
                        $nw
                    ]
                );
                break;

            case '4':
                DB::update(
                    'UPDATE experiences
                     SET pos_name=?, pos_company=?, pos_descr=?
                     WHERE experience_id=?',
                    [
                        $request->pos_name,
                        $request->pos_company,
                        $request->pos_descr,
                        $nx
                    ]
                );
                break;
        }

        return redirect('/admin/experience')
            ->with('success', 'Experience updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    */

    /**
     * Display all projects.
     */
    public function projectview()
    {
        $projects = project::all();

        return view('admin.project.index', [
            'project' => $projects
        ]);
    }


    /**
     * Show create project page.
     */
    public function createproject()
    {
        return view('admin.project.create');
    }


    /**
     * Store a new project.
     */

public function storeproject(Request $request)
{
    $request->validate([
        'project_name' => 'required|string|max:255',
        'project_descr' => 'required|string',
        'project_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $project = new project();

    // Required by the existing projects table
    $project->uniqueid = Str::random(20);

    $project->project_name = $request->project_name;
    $project->project_descr = $request->project_descr;

    if ($request->hasFile('project_image')) {

        $image = $request->file('project_image');

        $name = Str::slug($request->project_name) . '_' . time();

        $folder = '/img/';

        $filePath = $folder .
            $name . '.' .
            $image->getClientOriginalExtension();

        $this->uploadOne(
            $image,
            $folder,
            'public',
            $name
        );

        $project->project_image = $filePath;
    }

    $project->save();

    return redirect()
        ->route('admin.project')
        ->with('success', 'Project created successfully.');
}




    /**
     * Show edit project page.
     */
    public function editproject($id)
    {
        $project = project::findOrFail($id);

        return view('admin.project.edit', [
            'project' => $project
        ]);
    }


    /**
     * Update an existing project.
     */
    public function updateproject(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_descr' => 'required|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $project = project::findOrFail($id);

        $project->project_name = $request->project_name;
        $project->project_descr = $request->project_descr;

        /*
        |--------------------------------------------------------------------------
        | Replace Project Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('project_image')) {

            /*
            | Delete old image if it exists.
            */

            if (
                !empty($project->project_image) &&
                file_exists(public_path($project->project_image))
            ) {
                unlink(public_path($project->project_image));
            }

            $image = $request->file('project_image');

            $name = Str::slug($request->project_name) . '_' . time();

            $folder = '/img/';

            $filePath =
                $folder .
                $name .
                '.' .
                $image->getClientOriginalExtension();

            $this->uploadOne(
                $image,
                $folder,
                'public',
                $name
            );

            $project->project_image = $filePath;
        }

        $project->save();

        return redirect()
            ->route('admin.project')
            ->with('success', 'Project updated successfully.');
    }


    /**
     * Delete a project.
     */
    public function deleteproject($id)
    {
        $project = project::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Delete Project Image
        |--------------------------------------------------------------------------
        */

        if (
            !empty($project->project_image) &&
            file_exists(public_path($project->project_image))
        ) {
            unlink(public_path($project->project_image));
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Project
        |--------------------------------------------------------------------------
        */

        $project->delete();

        return redirect()
            ->route('admin.project')
            ->with('success', 'Project deleted successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Blog
    |--------------------------------------------------------------------------
    */

    public function blogview()
    {
        $blogs = blog::orderBy('blog_id', 'desc')->get();

        return view('admin.blog', [
            'blog' => $blogs
        ]);
    }


    /**
     * Create Blog.
     */
    public function createblog(Request $request)
    {
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_descr' => 'required|string',
            'blog_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $blog = new blog();

        $blog->blog_title = $request->blog_title;
        $blog->blog_descr = $request->blog_descr;

        if ($request->hasFile('blog_image')) {

            $image = $request->file('blog_image');

            $imageName = time() . '_' .
                Str::slug(
                    pathinfo(
                        $image->getClientOriginalName(),
                        PATHINFO_FILENAME
                    )
                ) . '.' .
                $image->getClientOriginalExtension();

            $uploadPath = public_path('uploads/blog');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move(
                $uploadPath,
                $imageName
            );

            $blog->blog_image =
                'uploads/blog/' . $imageName;
        }

        $blog->save();

        return redirect('/admin/blog')
            ->with('success', 'Blog post created successfully.');
    }


    /**
     * Update Blog.
     */
    public function updateblog(Request $request, $id)
    {
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_descr' => 'required|string',
            'blog_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $blog = blog::findOrFail($id);

        $blog->blog_title = $request->blog_title;
        $blog->blog_descr = $request->blog_descr;

        if ($request->hasFile('blog_image')) {

            if (
                !empty($blog->blog_image) &&
                file_exists(public_path($blog->blog_image))
            ) {
                unlink(public_path($blog->blog_image));
            }

            $image = $request->file('blog_image');

            $imageName = time() . '_' .
                Str::slug(
                    pathinfo(
                        $image->getClientOriginalName(),
                        PATHINFO_FILENAME
                    )
                ) . '.' .
                $image->getClientOriginalExtension();

            $uploadPath = public_path('uploads/blog');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move(
                $uploadPath,
                $imageName
            );

            $blog->blog_image =
                'uploads/blog/' . $imageName;
        }

        $blog->save();

        return redirect('/admin/blog')
            ->with('success', 'Blog post updated successfully.');
    }


    /**
     * Delete Blog.
     */
    public function deleteblog($id)
    {
        $blog = blog::findOrFail($id);

        if (
            !empty($blog->blog_image) &&
            file_exists(public_path($blog->blog_image))
        ) {
            unlink(public_path($blog->blog_image));
        }

        $blog->delete();

        return redirect('/admin/blog')
            ->with('success', 'Blog post deleted successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */

    public function serviceview()
    {
        $select = service::all();

        $basic = service::where('type', 'basic')->get();
        $pro = service::where('type', 'pro')->get();
        $premium = service::where('type', 'premium')->get();

        return view('admin.services', [
            'basic' => $basic,
            'pro' => $pro,
            'premium' => $premium,
            'select' => $select
        ]);
    }


    public function updateservices(Request $request)
    {
        switch ($request->up) {

            case '1':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 1]
                );
                break;

            case '2':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 2]
                );
                break;

            case '3':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 3]
                );
                break;

            case '4':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 4]
                );
                break;

            case '5':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 5]
                );
                break;

            case '6':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 6]
                );
                break;

            case '7':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 7]
                );
                break;

            case '8':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 8]
                );
                break;

            case '9':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 9]
                );
                break;

            case '10':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 10]
                );
                break;

            case '11':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 11]
                );
                break;

            case '12':
                DB::update(
                    'UPDATE services SET service_name=? WHERE service_id=?',
                    [$request->service_name, 12]
                );
                break;
        }

        return redirect('/admin/services')
            ->with('success', 'Services updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Contact
    |--------------------------------------------------------------------------
    */

    public function contactview()
    {
        $select = contact::all();

        return view('admin.contact', [
            'contact' => $select
        ]);
    }


    public function updatecontact(Request $request)
    {
        switch ($request->up) {

            case '1':

                DB::update(
                    'UPDATE contacts
                     SET contact_address=?,
                         contact_email=?,
                         contact_no=?,
                         contact_website=?
                     WHERE contact_id=?',
                    [
                        $request->contact_address,
                        $request->contact_email,
                        $request->contact_no,
                        $request->contact_website,
                        1
                    ]
                );

                break;
        }

        return redirect('/admin/contact')
            ->with('success', 'Contact information updated successfully.');
    }
}
