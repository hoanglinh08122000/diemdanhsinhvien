      <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">{{-- <img src="public/images/logo.png" alt="Logo"> --}}Quản lí Sinh viên</a>
           {{--  <a class="navbar-brand hidden" href="./"><img src="public/images/logo2.png" alt=""></a> --}}
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <li class="active">
                        <a href="{{ route('index') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                </li>
                @if (Session::get('level')==2)
                     <h3 class="menu-title">Điểm danh</h3>
                <li>
                    <a href="{{ route('listpoints.view_listpoints') }}"> <i class="menu-icon ti-list"></i>Điểm danh </a>    
                </li>
                
                @endif
               
                
                
                @if (Session::get('level')==1)
                    <h3 class="menu-title">quản lí thông tin</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Khóa học</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('course.index_course') }}">Xem </a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('course.view_insert_course') }}">Thêm </a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('course.show_course') }}">Sửa Khóa học</a></li>
                       </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bookmark"></i>Ngành học</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('discipline.index_discipline') }}">Xem </a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('discipline.view_insert_discipline') }}">Thêm </a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('discipline.show_discipline') }}">Sửa tên Ngành</a></li>
                    </ul>

                </li>
                </li><li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-suitcase"></i>Lớp</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('class.index_class') }}">Xem </a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('class.view_insert_class_under_student') }}">Thêm kèm chia</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('class.view_insert_class') }}">Thêm </a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('class.show_edit') }}">Sửa lớp</a></li>
{{--                         <li><i class="fa fa-id-badge"></i><a href="{{ route('class.assignment_class_subject') }}">Phân lớp</a></li> --}}
                    </ul>

                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Môn học</a>
                    <ul class="sub-menu children dropdown-menu">
                         <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('subject.index_subject') }}">Xem</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('subject.view_insert_subject') }}">Thêm</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('subject.show_subject') }}">Sửa môn</a></li>
                       </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-female "></i>Giáo viên</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-bars"></i><a href="{{ route('teacher.index_teacher') }}">Xem</a></li>

                        <li><i class="fa fa-bars"></i><a href="{{ route('teacher.view_insert_teacher') }}">Thêm</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('teacher.view_insert_teacher_excel') }}">Thêm Excel </a></li>
                        <li><i class="fa fa-bars"></i><a href="{{ route('teacher.assignment_subject_teacher') }}">Phân môn</a></li>
                        <li><i class="fa fa-bars"></i><a href="{{ route('teacher.subject_teacher') }}">Giáo viên -> Môn</a></li>

                        <li><i class="fa fa-share-square-o"></i><a href="{{ route('teacher.show_teacher') }}">Sửa thông tin</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Sinh Viên</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('students.view_insert_students') }}">Thêm </a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('students.show_students') }}">Sinh viên </a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('students.view_insert_students_excel') }}">Thêm Excel </a></li>
                        <li><i class="fa fa-share-square-o"></i><a href="{{ route('students.show_students') }}">Sửa thông tin</a></li>
                        
                    </ul>
                </li>
                
                 
               
                 <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-view-list"></i>Phân công</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{ route('assignment.assignment_teacher') }}">Theo giáo viên</a></li>
                        <li><i class="fa fa-table"></i><a href="{{ route('assignment.view_assignment_teacher') }}">Xem</a></li>
                        {{-- <li><i class="fa fa-table"></i><a href="{{ route('assignment.assignment_class') }}">Theo lớp</a></li> --}}
                        <li><i class="fa fa-table"></i><a href="{{ route('assignment.show') }}">Danh sách dạy</a></li>
                    </ul>
                    
                </li>
                @endif
               
                
            
               {{--  
                <h3 class="menu-title">Datatable</h3>
                <li>
                    <a href="{{ route('students.view_all') }}"> <i class="menu-icon fa fa-table"></i>View Sinh viên</a>
                </li>
 --}}
          
                <h3 class="menu-title">Người dùng</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Tài khoản</a>
                    <ul class="sub-menu children dropdown-menu">
                       {{--  <li><i class="menu-icon fa fa-sign-in"></i><a href="{{  route('login') }} ">Chuyển tài khoản</a></li> --}}
                       <li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('password.view_update_password') }}" >Thông tin User </a></li>
                       <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('login.logout') }}">Đăng xuất</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

    <!-- Left Panel -->