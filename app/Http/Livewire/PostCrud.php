<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Post;

class PostCrud extends Component
{
    public $posts, $nama_client, $email_client, $jadwal_meeting, $catatan, $post_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.post-crud');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->nama_client = '';
        $this->email_client = '';
        $this->jadwal_meeting = '';
        $this->catatan = '';
    }
    
    public function store()
    {
        $this->validate([
            'nama_client' => 'required',
            'email_client' => 'required',
            'jadwal_meeting' => 'required',
            'catatan' => 'required',
        ]);
    
        Post::updateOrCreate(['id' => $this->post_id], [
            'nama_client' => $this->nama_client,
            'email_client' => $this->email_client,
            'jadwal_meeting' => $this->jadwal_meeting,
            'catatan' => $this->catatan,
        ]);

        session()->flash('message', $this->post_id ? 'Data updated successfully.' : 'Data added successfully.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->nama_client = $post->nama_client;
        $this->email_client = $post->email_client;
        $this->jadwal_meeting = $post->Jadwal_meeting;
        $this->catatan = $post->catatan;
        $this->openModal();
    }
    
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }
} 