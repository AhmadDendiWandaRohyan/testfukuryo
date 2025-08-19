{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'Dashboard' }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- AdminLTE 4 CSS -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
</head>
<body class="layout-fixed sidebar-expand-lg">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Library</a>
    </div>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary">
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">📊 Dashboard</a></li>
          <li class="nav-item"><a href="{{ route('category') }}" class="nav-link">📂 Master Category</a></li>
          <li class="nav-item"><a href="{{ route('author') }}" class="nav-link">👤 Master Author</a></li>
          <li class="nav-item"><a href="{{ route('book') }}" class="nav-link">📚 Master Book</a></li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content -->
  <main class="content-wrapper p-3">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>My Library</strong> — Dibuat dengan ❤️
  </footer>
</div>

<!-- AdminLTE 4 JS -->
<script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #fff;
            border-right: 1px solid #ddd;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link.active {
            background: #009688;
            font-weight: bold;
        }
        .content {
            margin-left: 250px;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .header {
            background: #009688;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .footer {
            background: #009688;
            color: white;
            padding: 5px 20px;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
        }
        .main {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: #f5f8fa;
        }
        .user-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 30px;
            height: 30px;
            background: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column p-3">
        <div class="d-flex align-items-center mb-3">
            <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="25" height="25">
            <span class="ms-2 fw-bold">Laravel</span>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="material-icons">home</span> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('pages.category') }}" class="nav-link {{ request()->routeIs('pages.category') ? 'active' : '' }}">
                    <span class="material-icons">category</span> Master Category
                </a>
            </li>
            <li>
                <a href="{{ route('pages.author') }}" class="nav-link {{ request()->routeIs('pages.author') ? 'active' : '' }}">
                    <span class="material-icons">group</span> Master Author
                </a>
            </li>
            <li>
                <a href="{{ route('pages.book') }}" class="nav-link {{ request()->routeIs('pages.book') ? 'active' : '' }}">
                    <span class="material-icons">menu_book</span> Master Book
                </a>
            </li>
        </ul>
    </div>

    {{-- Main Content --}}
    <div class="content">
        
        {{-- Header --}}
        <div class="header">
            <div class="user-box">
                <div class="user-avatar"></div>
                <div>
                    <div>Administrator</div>
                    <small>Super Admin</small>
                </div>
            </div>
        </div>

        {{-- Main Section --}}
        <div class="main">
            {{-- <h4 class="fw-bold">{{ $title ?? 'Dashbord' }}</h4> --}}
            @yield('content')
        </div>

        {{-- Footer --}}
        <div class="footer">
            <span>Copyright © 2023 Tabler. v1.0.0-beta17</span>
            <span>Fukuryo Indonesia</span>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
