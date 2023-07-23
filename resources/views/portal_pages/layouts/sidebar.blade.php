<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
        <ul>
          {{-- <li class="menu-title">
            <span>Main</span>
          </li> --}}
          <li class="">
            <a href="{{ route('dashboard') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
            {{-- <ul style="display: none;">
              <li><a class="active" href="index.html">Admin Dashboard</a></li>
              <li><a href="employee-dashboard.html">Employee Dashboard</a></li>
            </ul> --}}
          </li>

          {{-- <li class="submenu">
            <a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="chat.html">Chat</a></li>
              <li class="submenu">
                <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                  <li><a href="voice-call.html">Voice Call</a></li>
                  <li><a href="video-call.html">Video Call</a></li>
                  <li><a href="outgoing-call.html">Outgoing Call</a></li>
                  <li><a href="incoming-call.html">Incoming Call</a></li>
                </ul>
              </li>
              <li><a href="events.html">Calendar</a></li>
              <li><a href="contacts.html">Contacts</a></li>
              <li><a href="inbox.html">Email</a></li>
              <li><a href="file-manager.html">File Manager</a></li>
            </ul>
          </li> --}}

              <li><a href="{{url('attendance-list')}}"><i class="la la-edit"></i> <span> Attendance</span></a></li>
              <li><a href="{{url('departments')}}"><i class="la la-files-o"></i> <span> Departments</span></a></li>
              <li><a href="{{url('designations')}}"><i class="la la-object-ungroup"></i> <span> Designations</span></a></li>
              <li><a href="{{url('all-employees')}}"><i class="la la-user"></i> <span> Employees</span></a></li>
              <li><a href="{{url('leaves')}}"><i class="la la-table"></i> <span>Leaves</span> </a></li>
              <li><a href="{{url('roles')}}"><i class="la la-object-ungroup"></i> <span>Roles</span> </a></li>
              <li><a href="{{url('permissions')}}"><i class="la la-table"></i> <span>Permission</span> </a></li>
              {{-- <li><a href="{{url('posts')}}"><i class="la la-columns"></i> <span>Posts</span> </a></li> --}}
              <li><a href="{{url('all-users')}}"><i class="la la-user-plus"></i> <span>Users</span> </a></li>


              {{-- <li><a href="holidays.html">Holidays</a></li>
              <li><a href="leaves.html">Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span></a></li>
              <li><a href="leaves-employee.html">Leaves (Employee)</a></li>
              <li><a href="leave-settings.html">Leave Settings</a></li>
              <li><a href="attendance.html">Attendance (Admin)</a></li>
              <li><a href="attendance-employee.html">Attendance (Employee)</a></li> --}}
              {{-- <li><a href="timesheet.html">Timesheet</a></li>
              <li><a href="shift-scheduling.html">Shift & Schedule</a></li>
              <li><a href="overtime.html">Overtime</a></li> --}}
            </ul>


          {{-- <li>
            <a href="clients.html"><i class="la la-users"></i> <span>Clients</span></a>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="projects.html">Projects</a></li>
              <li><a href="tasks.html">Tasks</a></li>
              <li><a href="task-board.html">Task Board</a></li>
            </ul>
          </li> --}}

          {{-- <li>
            <a href="leads.html"><i class="la la-user-secret"></i> <span>Leads</span></a>
          </li>
          <li>
            <a href="tickets.html"><i class="la la-ticket"></i> <span>Tickets</span></a>
          </li>
          <li class="menu-title">
            <span>HR</span>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-files-o"></i> <span> Sales </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="estimates.html">Estimates</a></li>
              <li><a href="invoices.html">Invoices</a></li>
              <li><a href="payments.html">Payments</a></li>
              <li><a href="expenses.html">Expenses</a></li>
              <li><a href="provident-fund.html">Provident Fund</a></li>
              <li><a href="taxes.html">Taxes</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-files-o"></i> <span> Accounting </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="categories.html">Categories</a></li>
              <li><a href="budgets.html">Budgets</a></li>
              <li><a href="budget-expenses.html">Budget Expenses</a></li>
              <li><a href="budget-revenues.html">Budget Revenues</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="salary.html"> Employee Salary </a></li>
              <li><a href="salary-view.html"> Payslip </a></li>
              <li><a href="payroll-items.html"> Payroll Items </a></li>
            </ul>
          </li>
          <li>
            <a href="policies.html"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="expense-reports.html"> Expense Report </a></li>
              <li><a href="invoice-reports.html"> Invoice Report </a></li>
              <li><a href="payments-reports.html"> Payments Report </a></li>
              <li><a href="project-reports.html"> Project Report </a></li>
              <li><a href="task-reports.html"> Task Report </a></li>
              <li><a href="user-reports.html"> User Report </a></li>
              <li><a href="employee-reports.html"> Employee Report </a></li>
              <li><a href="payslip-reports.html"> Payslip Report </a></li>
              <li><a href="attendance-reports.html"> Attendance Report </a></li>
              <li><a href="leave-reports.html"> Leave Report </a></li>
              <li><a href="daily-reports.html"> Daily Report </a></li>
            </ul>
          </li>
          <li class="menu-title">
            <span>Performance</span>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="performance-indicator.html"> Performance Indicator </a></li>
              <li><a href="performance.html"> Performance Review </a></li>
              <li><a href="performance-appraisal.html"> Performance Appraisal </a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="goal-tracking.html"> Goal List </a></li>
              <li><a href="goal-type.html"> Goal Type </a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="training.html"> Training List </a></li>
              <li><a href="trainers.html"> Trainers</a></li>
              <li><a href="training-type.html"> Training Type </a></li>
            </ul>
          </li> --}}
          {{-- <li><a href="promotion.html"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li>
          <li><a href="resignation.html"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>
          <li><a href="termination.html"><i class="la la-times-circle"></i> <span>Termination</span></a></li> --}}
          {{-- <li class="menu-title">
            <span>Administration</span>
          </li>
          <li>
            <a href="assets.html"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="user-dashboard.html"> User Dasboard </a></li>
              <li><a href="jobs-dashboard.html"> Jobs Dasboard </a></li>
              <li><a href="jobs.html"> Manage Jobs </a></li>
              <li><a href="manage-resumes.html"> Manage Resumes </a></li>
              <li><a href="shortlist-candidates.html"> Shortlist Candidates </a></li>
              <li><a href="interview-questions.html"> Interview Questions </a></li>
              <li><a href="offer_approvals.html"> Offer Approvals </a></li>
              <li><a href="experiance-level.html"> Experience Level </a></li>
              <li><a href="candidates.html"> Candidates List </a></li>
              <li><a href="schedule-timing.html"> Schedule timing </a></li>
              <li><a href="apptitude-result.html"> Aptitude Results </a></li>
            </ul>
          </li>
          <li>
            <a href="knowledgebase.html"><i class="la la-question"></i> <span>Knowledgebase</span></a>
          </li>
          <li>
            <a href="activities.html"><i class="la la-bell"></i> <span>Activities</span></a>
          </li>
          <li>
            <a href="users.html"><i class="la la-user-plus"></i> <span>Users</span></a>
          </li>
          <li>
            <a href="settings.html"><i class="la la-cog"></i> <span>Settings</span></a>
          </li>
          <li class="menu-title">
            <span>Pages</span>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="profile.html"> Employee Profile </a></li>
              <li><a href="client-profile.html"> Client Profile </a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-key"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="login.html"> Login </a></li>
              <li><a href="register.html"> Register </a></li>
              <li><a href="forgot-password.html"> Forgot Password </a></li>
              <li><a href="otp.html"> OTP </a></li>
              <li><a href="lock-screen.html"> Lock Screen </a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-exclamation-triangle"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="error-404.html">404 Error </a></li>
              <li><a href="error-500.html">500 Error </a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-hand-o-up"></i> <span> Subscriptions </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="subscriptions.html"> Subscriptions (Admin) </a></li>
              <li><a href="subscriptions-company.html"> Subscriptions (Company) </a></li>
              <li><a href="subscribed-companies.html"> Subscribed Companies</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="search.html"> Search </a></li>
              <li><a href="faq.html"> FAQ </a></li>
              <li><a href="terms.html"> Terms </a></li>
              <li><a href="privacy-policy.html"> Privacy Policy </a></li>
              <li><a href="blank-page.html"> Blank Page </a></li>
            </ul>
          </li>
          <li class="menu-title">
            <span>UI Interface</span>
          </li>
          <li>
            <a href="components.html"><i class="la la-puzzle-piece"></i> <span>Components</span></a>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-object-group"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
              <li><a href="form-input-groups.html">Input Groups </a></li>
              <li><a href="form-horizontal.html">Horizontal Form </a></li>
              <li><a href="form-vertical.html"> Vertical Form </a></li>
              <li><a href="form-mask.html"> Form Mask </a></li>
              <li><a href="form-validation.html"> Form Validation </a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="la la-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li><a href="tables-basic.html">Basic Tables </a></li>
              <li><a href="data-tables.html">Data Table </a></li>
            </ul>
          </li>
          <li class="menu-title">
            <span>Extras</span>
          </li>
          <li>
            <a href="#"><i class="la la-file-text"></i> <span>Documentation</span></a>
          </li>
          <li>
            <a href="javascript:void(0);"><i class="la la-info"></i> <span>Change Log</span> <span class="badge badge-primary ml-auto">v3.4</span></a>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
              <li class="submenu">
                <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                  <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                  <li class="submenu">
                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                      <li><a href="javascript:void(0);">Level 3</a></li>
                      <li><a href="javascript:void(0);">Level 3</a></li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                </ul>
              </li>
              <li>
                <a href="javascript:void(0);"> <span>Level 1</span></a>
              </li>
            </ul>
          </li>
        </ul>--}}
      </div>
    </div>
  </div>
