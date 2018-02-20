<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		@if (! Auth::guest())
			<div class="user-panel">
				<div class="pull-left image">
					<img src={{ asset('img/user1-128x128.jpg') }} class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>{{ Auth::user()->name }}</p>
					<!-- Status -->
					<a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
				</div>
			</div>
		@endif
		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">{{ trans('adminlte_lang::message.header') }}</li>
			<!-- Optionally, you can add icons to the links -->
			@if(!Auth::user()->hasRole('Administrator'))
			<li class="{!! Request::is('currency') ? 'active' : '' !!}"><a href="{{ url('currency') }}"><i class='fa fa-usd'></i> <span>Currency Rate</span></a></li>
			
			<li class="treeview active">
				<!-- <a href="#"><i class='fa fa-navicon'></i> <span>Order</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu"> -->
					<li class="{!! Request::is('order') ? 'active' : '' !!}"><a href="{{ url('order') }}"><i class='fa fa-list'></i> <span>Order</span></a></li>
				<!-- </ul> -->
			</li>
			@endif

			@if(Auth::user()->hasRole('Manager'))
			<li class="treeview active">
				<a href="#"><i class='fa fa-money'></i> <span>Banknote</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
					<!-- <li class="{!! Request::is('banknote') ? 'active' : '' !!}"><a href="{{ url('banknote') }}"><i class='fa fa-cubes'></i> <span>Banknote</span></a></li> -->
					<li class="{!! Request::is('banknote') ? 'active' : '' !!}"><a href="{{ url('banknote') }}"><i class='fa fa-list-ul'></i> <span>Banknote Transaction</span></a></li>
				</ul>
			</li>
			@endif

			@if(Auth::user()->hasRole('Administrator'))
			<li class="treeview active">
				<!-- <a href="#"><i class='fa fa-users'></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu"> -->
					<li class="{!! Request::is('user') ? 'active' : '' !!}"><a href="{{ url('user') }}"><i class='fa fa-users'></i> <span>User List</span></a></li>
				<!-- </ul> -->
			</li>
			@else
			<li class="{!! Request::is('user') ? 'active' : '' !!}"><a href="{{ url('/user/show') }}"><i class='fa fa-user'></i> <span>My Profile</span></a></li>
			@endif

		</ul><!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>
