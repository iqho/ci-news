<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        // $model = model(NewsModel::class);
        $model = new NewsModel;

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/overview')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function create()
    {
        $model = model(NewsModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required',
        ])) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
                'body'  => $this->request->getPost('body'),
            ]);

            return view('news/success');
        }

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/create')
            . view('templates/footer');
    }

    public function edit(int $id)
    {
        $model = new NewsModel;
        $model->where('id', $id);
        $data['news'] = $model->first();
        $data['title'] = "Update News";

        return view('templates/header', $data)
            . view('news/edit')
            . view('templates/footer');
    }

    public function update()
    {
        $userModel = new NewsModel();
        $id = $this->request->getVar('id');
        $data = [
            'title' => $this->request->getPost('title'),
            'slug'  => url_title($this->request->getPost('title'), '-', true),
            'body'  => $this->request->getPost('body'),
        ];
        $userModel->update($id, $data);
        $this->load->helper('url');
        return redirect()->to('/news')->with('succMsg', 'News updated successfully');
    }

    public function delete(int $id)
    {
        $model = new NewsModel;
        $model->where('id', $id);
        $model->delete();

        return view('news/success');
    }
}
