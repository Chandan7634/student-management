<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Student</title>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <meta name="description" content="" />
      
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
      <style>
         .alert-success{
            width: 700px;
            margin-top: 11px;
         }
         small{
            color: #ff0000a3;
         }
         .card-header{
            display: flex;
            justify-content: space-between;
            align-items: center;
         }
      </style>
   </head>
   <body>
      <div class="page-wrapper">
         <header class="header-wrapper main-header">
            <div class="header-inner-wrapper">
               <div class="header-right">
                  <div class="header-left">
                        <div class="header-links">
                        <a href="javascript:void(0);" class="toggle-btn">
                           <span></span>
                        </a>
                        </div>
                       
                     <div class="header-links search-link">
                        <a class="search-toggle" href="javascript:void(0);">
                           <svg
                              version="1.1"
                              xmlns="http://www.w3.org/2000/svg"
                              xmlns:xlink="http://www.w3.org/1999/xlink"
                              x="0px"
                              y="0px"
                              viewBox="0 0 56.966 56.966"
                              style="enable-background: new 0 0 56.966 56.966"
                              xml:space="preserve">
                              <path
                                 d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                                    s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                                    c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
                                    s-17-7.626-17-17S14.61,6,23.984,6z" />
                           </svg>
                        </a>
                     </div>
                      @if(session('flash_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('flash_message') }}</strong> 
                            <button type="button" class="close" id="closeMsg" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                  </div>
                   <div class="header-controls">
                     <a href="{{ route('logout') }}" class="btn text-light bg-danger">Logout</a>
                  </div>
               </div>
            </div>
         </header>
         <aside class="sidebar-wrapper">
            <div class="logo-wrapper">
               <a href="javascript:void(0)" class="admin-logo">
                  <h4>Hello {{ ucfirst(Auth::user()->name) }} </h4>
               </a>
            </div>
            <div class="side-menu-wrap">
               <ul class="main-menu">
                  

                 @if (Auth::user()->role == 2)
                  <li>
                     <a href="{{ url('parties') }}">
                        <span class="icon-menu">
                           <svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="feather feather-package">
                              <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                              <path
                                 d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                              <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                              <line x1="12" y1="22.08" x2="12" y2="12"></line>
                           </svg>
                        </span>
                        <span class="menu-text"> Party </span>
                     </a>
                  </li>
                 @endif
                  <li>
                     <a href="{{ url('classes') }}">
                        <span class="icon-menu">
                           <svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="feather feather-tablet">
                              <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                              <line x1="12" y1="18" x2="12.01" y2="18"></line>
                           </svg>
                        </span>
                        <span class="menu-text"> Classes </span>
                     </a>
                  </li> 
                  <li>
                     <a href="{{ url('students') }}" class="active">
                        <span class="icon-menu">
                           <svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="feather feather-users">
                              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                              <circle cx="9" cy="7" r="4"></circle>
                              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                           </svg>
                        </span>
                        <span class="menu-text"> Student </span>
                     </a>
                  </li>
                   <li>
                     <a href="{{ url('attendence') }}">
                        <span class="icon-menu">
                           <svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="feather feather-calendar">
                              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                              <line x1="16" y1="2" x2="16" y2="6"></line>
                              <line x1="8" y1="2" x2="8" y2="6"></line>
                              <line x1="3" y1="10" x2="21" y2="10"></line>
                           </svg>
                        </span>
                        <span class="menu-text"> Attendence </span>
                     </a>
                  </li>

                 <li>
                     <a href="{{ url('revenue') }}">
                        <span class="icon-menu">
                           <svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="feather feather-grid nav-icon">
                              <rect x="3" y="3" width="7" height="7"></rect>
                              <rect x="14" y="3" width="7" height="7"></rect>
                              <rect x="14" y="14" width="7" height="7"></rect>
                              <rect x="3" y="14" width="7" height="7"></rect>
                           </svg>
                        </span>
                        <span class="menu-text"> Revenue </span>
                     </a>
                  </li>
                 {{--  <li>
                     <a href="{{ url('payments') }}">
                        <span class="icon-menu">
                           <svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="feather feather-tablet">
                              <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                              <line x1="12" y1="18" x2="12.01" y2="18"></line>
                           </svg>
                        </span>
                        <span class="menu-text"> Payment </span>
                     </a>
                  </li> --}}
               </ul>
            </div>
         </aside>
         <div class="page-wrapper">
            <div class="main-content">
               <div class="row">
                  @yield('content')
               </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
      @yield('script')
      <script>

         $(document).ready(function(){
            $('#classId').change(function(){
               let classId = $(this).val();
               let partyId = $('#partyId').val();
               
               $.ajax({
                  url: "/fetch",
                  type: "GET",
                  data: {
                   classId: classId,
                   partyId: partyId,
                  },
                  success: function (res) {
                     $('#students').html(res)
                  },
                  error: function (e) {
                  },
               });
            })
         })
          $(".toggle-btn").on("click", function (e) {
            e.stopPropagation();
            $("body").toggleClass("mini-sidebar");
            $(this).toggleClass("checked");
         });
         setTimeout(() => {
            $('.alert').fadeOut(1500);
         }, 3000);
         $('#closeMsg').click(function(){
            $('.alert').fadeOut(100);
         })
      </script>
      <script>
       $(document).ready(function(){

           $('#student').on('change',function(){
            let type = $('#paidType').val();
            let student = $('#student').val();
            $.ajax({
                url: "/fetch_revenue",
                type: "GET",
                data: {
                student: student,
               },
                success: function (res) {
                  $('#total_amount').val(res)
                  if(res == 'Student already paid full amount!'){
                     $('#submitButton').addClass('disabled')
                  }else{
                     $('#submitButton').removeClass('disabled')
                  }
                  // for calculate amount 
                  let totalAmount = $('#total_amount').val();
                  let paidAmount = $('#paidAmount').val();
                },
                error: function (e) {
                },
            });
        })

        $('#partyId').on('change',function(){
            let partyId = $('#partyId').val();
            $.ajax({
                url: "/fetch_student",
                type: "GET",
                data: {
                partyId: partyId
               },
                success: function (res) {
                  $('#student').html(res);
                },
                error: function (e) {
                },
            });
        })

        $('#student,#month,#partyId').on('change',function(){
         let totalAmount = parseInt($('#total_amount').val());
         let paidAmount = parseInt($('#paidAmount').val());
            if(totalAmount > paidAmount){
                $('#addRow').html(`<div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="due_amount">Due Amount</label>
                                        <input type="number" readonly name="due_amount" id="due_amount" class="form-control @error('due_amount') {{ 'is-invalid' }} @enderror" placeholder="Enter due amount">
                                        <small>
                                            @error('due_amount')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="reason">Due Reason</label>
                                        <input type="text" name="reason" id="reason" class="form-control @error('reason') {{ 'is-invalid' }} @enderror" placeholder="Enter reason">
                                        <small>
                                            @error('reason')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                            </div>`)
                           $('#due_amount').val(totalAmount-paidAmount);
                           
            }else{
                $('#addRow').html('');
            }
        })

       
        $('#paid_type_edit').on('change',function(){
         let type = $('#paid_type_edit').val();
         let editId = $('#editId').val();
            $.ajax({
                url: "/edit_revenue",
                type: "GET",
                data: {
                type: type,
                editId: editId,
               },
                success: function (res) {
                  if(res == 'Student already paid full amount!'){
                     $('#submitButton').addClass('disabled')
                  }else{
                     $('#submitButton').removeClass('disabled')
                     $('#total_amount').val(res);
                  }
                  $('#total_amount').val(res)
                  let totalAmount = parseInt($('#total_amount').val());
                  let paidAmount = parseInt($('#paidAmount').val());
                  $('#due_amount').val(totalAmount-paidAmount);
                },
                error: function (e) {
                },
            });
        });

        $('.monthly_fees').show();
        $('.yearly_fees').hide();
        $(document).on('click','.fee_toggle',function(){
            if($(this).text().trim() == 'Monthly Fee'){
               $(this).removeClass('btn-warning')
               $(this).addClass('btn-outline-warning')
                $('.monthly_fees').show();
                $('.yearly_fees').hide();
                $(this).siblings('.fee_toggle').removeClass('btn-warning')
            }else{
               $(this).siblings('.fee_toggle').removeClass('btn-warning')
               $(this).addClass('btn-warning')
                $('.monthly_fees').hide();
                $('.yearly_fees').show();
            }
        })

      //    $('#reason').keyup(function(){
      //       // let val =$(this).val();
      //       // alert(val)
      //       console.log("Dd")
      //       // #('#roason_id').val()
      //   })
      })
    </script>
   </body>
</html>