<?php

namespace App\Http\Livewire\Components\Members;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Services\Member\MemberService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ComponentMembersForm extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $name, $email, $photo, $nisn, $password;
    public $member_id;
    public $existingFile = false;

    protected function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'photo' => 'nullable|image|max:2048|mimes:jpg,png,jpeg',
            'nisn' => 'required',
            'password' => 'required',
        ];
        return $rules;
    }

    public function mount($member_id = null, MemberService $member_service)
    {
        $this->member_id = $member_id;
        if ($this->member_id) {
            $this->member = $member_service->getById($this->member_id);
            $this->photo = $this->member->photo;
            $this->name = $this->member->name;
            $this->nisn = $this->member->identity_number;
            $this->email = $this->member->email;
        }
    }

    public function render()
    {
        return view('livewire.components.members.component-members-form');
    }

    public function store(MemberService $member_service)
    {
        $this->validate();
        if ($this->photo) {
            $photo = $this->photo->store('photos', 'public');
        } else {
            $photo = null;
        }
        if (Auth::user()->role == User::ROLE_ADMIN) {
            $role = 'MEMBER';
        } else {
            $role = 'ADMIN';
        }
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'photo' => $photo,
            'identity_number' => $this->nisn,
            'password' => $hashedPassword,
            'role' => $role,
        ];
        $member_service->create($data);
        if (Auth::user()->role == User::ROLE_ADMIN) {
            $this->flash('success', 'Member successfully added!', [], route('admin.members.index'));
        } elseif (Auth::user()->role == User::ROLE_SUPERADMIN) {
            $this->flash('success', 'Staff successfully added!', [], route('super.dashboard.index'));
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update(MemberService $member_service)
    {
        $this->validate([
            'name' => 'required',
            'nisn' => 'required',
        ]);

        if (Auth::user()->role == User::ROLE_ADMIN) {
            $role = 'MEMBER';
        } else {
            $role = 'ADMIN';
        }
        if ($this->password) {
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        }
        if ($this->email != $this->member->email && $this->password != $this->member->password) {
            $this->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);
        }
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'identity_number' => $this->nisn,
            'role' => $role,
        ];
        if (!empty($this->password)) {
            $data['password'] = $hashedPassword;
        }
        if (!is_string($this->photo) && $this->photo != null) {
            $photo = $this->photo->store('photos', 'public');
            $data['photo'] = $photo;
        }
        $member_service->update($this->member_id, $data);
        if (auth()->user()->role == User::ROLE_ADMIN) {
            $this->flash('success', 'Member have been added', [], route('admin.members.index'));
        } else {
            $this->flash('success', 'Staff have been added', [], route('super.dashboard.index'));
        }
    }

    public function destroy(MemberService $member_service)
    {
        $member_service->delete($this->member_id);
        if (auth()->user()->role == User::ROLE_ADMIN) {
            $this->flash('success', 'Member have been deleted', [], route('admin.members.index'));
        } else {
            $this->flash('success', 'Staff have been deleted', [], route('super.dashboard.index'));
        }
    }

    public function openDeleteModal()
    {
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function closeDeleteModal()
    {
        $this->dispatchBrowserEvent('closeModalDelete');
    }
}
