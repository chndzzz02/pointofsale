@extends('layouts.admin')

@section('title', 'Kelola User')

@section('content')

<style>

/* =========================
   USERS PAGE MODERN UI
========================= */

.users-page{
    animation:fadeUp .6s ease;
}

/* HEADER */

.users-header{
    margin-bottom:28px;
}

.users-title{
    font-size:34px;
    font-weight:800;
    color:#111827;
    letter-spacing:-1px;
    margin-bottom:8px;
}

.users-subtitle{
    color:#6b7280;
    font-size:15px;
}

/* CARD */

.users-card{
    background:white;
    border-radius:32px;
    border:1px solid #eef2f7;
    overflow:hidden;
    box-shadow:
        0 12px 40px rgba(15,23,42,.04);
}

/* TOP ACTION */

.top-action{
    padding:28px 30px;
    border-bottom:1px solid #f1f5f9;
}

.add-user-btn{
    height:54px;
    padding:0 24px;
    border:none;
    border-radius:18px;
    background:#111827;
    color:white;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
    transition:.35s;
}

.add-user-btn:hover{
    transform:translateY(-3px);
    color:white;
    box-shadow:
        0 15px 35px rgba(17,24,39,.15);
}

/* TABLE */

.table-wrapper{
    padding:10px 22px 22px;
}

.table-modern{
    width:100%;
    border-collapse:separate;
    border-spacing:0 14px;
}

.table-modern thead th{
    border:none;
    color:#6b7280;
    font-size:13px;
    font-weight:700;
    padding:0 18px 10px;
    white-space:nowrap;
}

.table-modern tbody tr{
    background:#f8fafc;
    transition:.35s;
}

.table-modern tbody tr:hover{
    background:white;
    box-shadow:
        0 14px 35px rgba(15,23,42,.06);

    transform:translateY(-2px);
}

.table-modern td{
    padding:20px 18px;
    border:none;
    vertical-align:middle;
}

.table-modern tbody tr td:first-child{
    border-radius:20px 0 0 20px;
}

.table-modern tbody tr td:last-child{
    border-radius:0 20px 20px 0;
}

/* USER INFO */

.user-info{
    display:flex;
    align-items:center;
    gap:14px;
}

.user-avatar{
    width:52px;
    height:52px;
    border-radius:18px;
    background:#111827;
    color:white;
    font-weight:700;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    flex-shrink:0;
}

.user-name{
    font-weight:700;
    color:#111827;
    margin-bottom:3px;
}

.user-email{
    font-size:13px;
    color:#6b7280;
}

/* ROLE */

.role-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:10px 16px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
    text-transform:capitalize;
}

.role-admin{
    background:#111827;
    color:white;
}

.role-seller{
    background:#f3f4f6;
    color:#111827;
}

.role-customer{
    background:#eef2ff;
    color:#4338ca;
}

/* ACTION BUTTONS */

.action-group{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

.btn-edit-modern{
    height:44px;
    padding:0 18px;
    border:none;
    border-radius:14px;
    background:#111827;
    color:white;
    font-size:13px;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
    transition:.3s;
}

.btn-edit-modern:hover{
    color:white;
    transform:translateY(-2px);
}

.btn-delete-modern{
    height:44px;
    padding:0 18px;
    border:none;
    border-radius:14px;
    background:#fef2f2;
    color:#dc2626;
    font-size:13px;
    font-weight:700;
    display:inline-flex;
    align-items:center;
    gap:8px;
    transition:.3s;
}

.btn-delete-modern:hover{
    background:#dc2626;
    color:white;
}

/* PAGINATION */

.pagination-wrapper{
    padding:0 30px 30px;
}

/* EMPTY */

.empty-state{
    padding:70px 20px;
    text-align:center;
}

.empty-icon{
    width:90px;
    height:90px;
    border-radius:28px;
    background:#f3f4f6;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    margin-bottom:20px;
    font-size:38px;
    color:#6b7280;
}

.empty-title{
    font-size:22px;
    font-weight:800;
    color:#111827;
    margin-bottom:8px;
}

.empty-text{
    color:#6b7280;
    font-size:14px;
}

/* ANIMATION */

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(25px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* MOBILE */

@media(max-width:768px){

    .users-title{
        font-size:28px;
    }

    .top-action{
        padding:22px;
    }

    .table-wrapper{
        padding:0 12px 20px;
    }

    .table-modern{
        min-width:780px;
    }

}

</style>

<div class="container-fluid users-page">

    {{-- HEADER --}}
    <div class="users-header d-flex justify-content-between align-items-center flex-wrap gap-3">

        <div>

            <h1 class="users-title">
                Kelola User
            </h1>

            <div class="users-subtitle">
                Manajemen data pengguna admin, seller, dan customer
            </div>

        </div>

        <a href="{{ route('admin.users.create') }}"
           class="add-user-btn">

            <i class="bi bi-plus-lg"></i>

            Tambah User

        </a>

    </div>

    {{-- CARD --}}
    <div class="users-card">

        @if($users->count())

        <div class="table-wrapper">

            <div class="table-responsive">

                <table class="table-modern">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($users as $user)

                        <tr>

                            <td class="fw-bold text-dark">
                                #{{ $user->id }}
                            </td>

                            <td>

                                <div class="user-info">

                                    <div class="user-avatar">

                                        {{ strtoupper(substr($user->name,0,1)) }}

                                    </div>

                                    <div>

                                        <div class="user-name">
                                            {{ $user->name }}
                                        </div>

                                        <div class="user-email">
                                            {{ $user->email }}
                                        </div>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <span class="role-badge
                                    {{ $user->role == 'admin' ? 'role-admin' :
                                       ($user->role == 'seller' ? 'role-seller' : 'role-customer') }}">

                                    {{ ucfirst($user->role) }}

                                </span>

                            </td>

                            <td>

                                <div class="action-group">

                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="btn-edit-modern">

                                        <i class="bi bi-pencil-square"></i>

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-delete-modern">

                                            <i class="bi bi-trash3"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <div class="pagination-wrapper">

            {{ $users->links() }}

        </div>

        @else

        <div class="empty-state">

            <div class="empty-icon">

                <i class="bi bi-people"></i>

            </div>

            <div class="empty-title">
                Belum Ada User
            </div>

            <div class="empty-text">
                Data pengguna akan muncul di halaman ini
            </div>

        </div>

        @endif

    </div>

</div>

@endsection