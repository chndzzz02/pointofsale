@extends('layouts.admin')

@section('title', 'Kelola User')

@section('content')

<style>

/* =========================
   USERS PAGE MODERN UI
========================= */

/* =========================
   USERS PAGE PREMIUM UI
========================= */

.users-page{
    animation:fadeUp .5s ease;
    padding-bottom:30px;
}

/* HEADER */

.users-header{
    margin-bottom:24px;
}

.users-title{
    font-size:30px;
    font-weight:800;
    color:#0f172a;
    letter-spacing:-1px;
    margin-bottom:6px;
}

.users-subtitle{
    color:#64748b;
    font-size:14px;
    line-height:1.6;
}

/* CARD */

.users-card{
    background:white;

    border-radius:26px;

    border:1px solid #e9eef5;

    overflow:hidden;

    box-shadow:
        0 10px 30px rgba(15,23,42,.05);
}

/* TOP ACTION */

.top-action{
    padding:24px 26px;
    border-bottom:1px solid #eef2f7;
}

.add-user-btn{
    height:46px;

    padding:0 18px;

    border:none;

    border-radius:14px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #4f46e5
        );

    color:white;

    font-size:13px;
    font-weight:700;

    display:inline-flex;
    align-items:center;
    gap:8px;

    text-decoration:none;

    transition:.3s;

    box-shadow:
        0 10px 20px rgba(37,99,235,.15);
}

.add-user-btn:hover{
    transform:translateY(-2px);

    color:white;

    box-shadow:
        0 16px 28px rgba(37,99,235,.22);
}

/* TABLE */

.table-wrapper{
    padding:12px 18px 20px;
}

.table-modern{
    width:100%;
    border-collapse:separate;
    border-spacing:0 10px;
}

.table-modern thead th{
    border:none;

    color:#64748b;

    font-size:12px;
    font-weight:700;

    padding:0 16px 10px;

    white-space:nowrap;
}

.table-modern tbody tr{
    background:#f8fafc;

    transition:.25s;
}

.table-modern tbody tr:hover{
    background:white;

    transform:translateY(-2px);

    box-shadow:
        0 10px 24px rgba(15,23,42,.06);
}

.table-modern td{
    padding:16px;
    border:none;
    vertical-align:middle;
}

.table-modern tbody tr td:first-child{
    border-radius:16px 0 0 16px;
}

.table-modern tbody tr td:last-child{
    border-radius:0 16px 16px 0;
}

/* USER INFO */

.user-info{
    display:flex;
    align-items:center;
    gap:12px;
}

.user-avatar{
    width:48px;
    height:48px;

    border-radius:16px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #4f46e5
        );

    color:white;

    font-weight:700;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:16px;

    flex-shrink:0;

    box-shadow:
        0 8px 18px rgba(37,99,235,.15);
}

.user-name{
    font-weight:700;
    color:#0f172a;
    margin-bottom:2px;
    font-size:14px;
}

.user-email{
    font-size:12px;
    color:#64748b;
}

/* ROLE BADGE */

.role-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding:7px 14px;

    border-radius:999px;

    font-size:11px;
    font-weight:700;

    text-transform:capitalize;
}

.role-admin{
    background:#dbeafe;
    color:#1d4ed8;
}

.role-seller{
    background:#ecfdf5;
    color:#059669;
}

.role-customer{
    background:#f3f4f6;
    color:#475569;
}

/* ACTION */

.action-group{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.btn-edit-modern{
    height:40px;

    padding:0 15px;

    border:none;

    border-radius:12px;

    background:#eff6ff;

    color:#2563eb;

    font-size:12px;
    font-weight:700;

    display:inline-flex;
    align-items:center;
    gap:6px;

    text-decoration:none;

    transition:.25s;
}

.btn-edit-modern:hover{
    background:#2563eb;
    color:white;

    transform:translateY(-2px);
}

.btn-delete-modern{
    height:40px;

    padding:0 15px;

    border:none;

    border-radius:12px;

    background:#fef2f2;

    color:#dc2626;

    font-size:12px;
    font-weight:700;

    display:inline-flex;
    align-items:center;
    gap:6px;

    transition:.25s;
}

.btn-delete-modern:hover{
    background:#dc2626;
    color:white;

    transform:translateY(-2px);
}

/* PAGINATION */

.pagination-wrapper{
    padding:0 24px 24px;
}

/* EMPTY STATE */

.empty-state{
    padding:60px 20px;
    text-align:center;
}

.empty-icon{
    width:82px;
    height:82px;

    border-radius:24px;

    background:#eff6ff;

    display:flex;
    align-items:center;
    justify-content:center;

    margin:auto;
    margin-bottom:18px;

    font-size:34px;

    color:#2563eb;
}

.empty-title{
    font-size:20px;
    font-weight:800;
    color:#0f172a;
    margin-bottom:6px;
}

.empty-text{
    color:#64748b;
    font-size:13px;
}

/* ANIMATION */

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* MOBILE */

@media(max-width:768px){

    .users-title{
        font-size:24px;
    }

    .table-wrapper{
        padding:8px 10px 18px;
    }

    .table-modern{
        min-width:760px;
    }

    .users-card{
        border-radius:20px;
    }

}
</style>

<div class="container-fluid users-page">

    {{-- HEADER --}}
    <div class="users-header d-flex justify-content-between align-items-center flex-wrap gap-3">

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