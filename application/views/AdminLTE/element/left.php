
<style>
    .currentSelect {
    padding: 5px 5px 5px 15px;
    display: block;
    font-size: 14px;
    color: green !important;
}
    </style>
<aside class="main-sidebar">
  
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
             <?php $userData = $this->session->all_userdata(); 
          // print_r($userData);
           ?>
          <p><?php echo ucfirst($userData['user_data']['first_name']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online  <span style="color:red;"> <?php  $url =  $this->uri->segment(1);//die; ?></span></a>
        </div>
      </div>     
   
      <ul class="sidebar-menu" data-widget="tree">
<!--        <li class="header">MAIN NAVIGATION</li>-->
        <li class="<?php if($url == 'category' || $url == 'subject' || $url == 'chapter' || $url == 'topic' || $url == ' '){echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Masters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url(''); ?>"><i class="fa fa-circle-o"></i>Dashboard</a></li>
          <li><a <?php if($url == 'category'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('category'); ?>"><i class="fa fa-circle-o"></i>Category Master</a></li>
            <li><a <?php if($url == 'subject'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('subject'); ?>"><i class="fa fa-circle-o"></i> Subject Master</a></li>
            <li><a <?php if($url == 'chapter'){echo 'class="currentSelect"';} ?>  href="<?php echo base_url('chapter'); ?>"><i class="fa fa-circle-o"></i> Chapter Master</a></li>
            <li><a  <?php if($url == 'topic'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('topic'); ?>"><i class="fa fa-circle-o"></i> Topic Master</a></li>
           
          </ul>
        </li>
        <li class="<?php if($url == 'tagging' || $url == 'examsubject' || $url == 'examsubjectchapter' || $url == 'examsubjectchaptertopic' ){echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Tagging Masters</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a <?php if($url == 'tagging'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('tagging'); ?>"><i class="fa fa-circle-o"></i> Tagging Master</a></li>
            <li><a <?php if($url == 'examsubject'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('examsubject'); ?>"><i class="fa fa-circle-o"></i> Exam Subject</a></li>
            <li><a <?php if($url == 'examsubjectchapter'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('examsubjectchapter'); ?>"><i class="fa fa-circle-o"></i> Subject Chapter</a></li>
            <li><a <?php if($url == 'examsubjectchaptertopic'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('examsubjectchaptertopic'); ?>"><i class="fa fa-circle-o"></i> Subject Chapter Topic</a></li>
           
          </ul>
        </li>
<!--        <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>-->
        <li class=" <?php if($url == 'questiontype' || $url == 'addquestion' ){echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Question Bank</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a <?php if($url == 'questiontype'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('questiontype'); ?>"><i class="fa fa-circle-o"></i> Question Type Master</a></li>
            <li><a <?php if($url == 'addquestion'){echo 'class="currentSelect"';} ?> href="<?php echo base_url('addquestion'); ?>"><i class="fa fa-circle-o"></i> Add Question</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
<!--        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>-->
<!--        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>-->
<!--        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>-->
<!--        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>-->
<!--        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>-->
<!--        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>-->
<!--        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>-->
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>