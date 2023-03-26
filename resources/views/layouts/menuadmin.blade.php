<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Sản phẩm
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('product.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tất cả sản phẩm</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('category.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tất cả danh mục</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('brand.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tất cả thương hiệu</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Bài viết
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('post.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tất cả bài viết</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('page.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Trang đơn</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('topic.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Chủ đề</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Giao diện
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('menu.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Menu</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('slider.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Slider</p>
            </a>
          </li>
        </ul>
      </li>


      <a href="{{ route('product.index')}}" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">Sản phẩm</p>
      </a>
      <a href="{{ route('brand.index')}}" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">thương hiệu</p>
      </a>
      <a href="{{ route('category.index')}}" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">danh mục</p>
      </a>
      <a href="{{ route('topic.index')}}" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">Chủ đề</p>
      </a>
      <a href="{{ route('page.index')}}" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">Trang đơn</p>
      </a>
      <a href="{{ route('post.index')}}" class="nav-link">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p class="text">Bài viết</p>
      </a>
      

      <li class="nav-header">LABELS</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-circle text-danger"></i>
          <p class="text">Important</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-circle text-warning"></i>
          <p>Warning</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-circle text-info"></i>
          <p>Informational</p>
        </a>
      </li>
    </ul>
  </nav>
