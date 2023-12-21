<?php

namespace App\Http\Livewire\Components\Members;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\Member\MemberService;

class ComponentMembersIndex extends Component
{
    public function render(MemberService $member_service)
    {
        if (Auth::user()->role == User::ROLE_ADMIN) {
            $members = $member_service->getMemberOnly();
        } else {
            $members = $member_service->getStaffOnly();
        }
        return view('livewire.components.members.component-members-index', compact('members'));
    }

    public function redirect($id)
    {
        return redirect()->route('super.dashboard.edit', ['id' => $id]);
    }
}
