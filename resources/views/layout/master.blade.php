<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carbon - Admin Template</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/fc-3.2.4/fh-3.1.3/r-2.2.1/sl-1.2.5/datatables.min.css"/>


</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            <img src="/images/dashboard/logo.png" alt="logo">
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>

            <li class="nav-item d-md-down-none">
                <a href="#">
                    <i class="fa fa-envelope-open"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="/images/dashboard/avatar-1.png" class="avatar avatar-sm" alt="logo">
                    <span class="small ml-1 d-md-down-none">John Smith</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">Account</div>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-user"></i> Profile
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope"></i> Messages
                    </a>

                    <div class="dropdown-header">Settings</div>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-bell"></i> Notifications
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-wrench"></i> Settings
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-lock"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">Navigation</li>

                    <li class="nav-item">
                        <a href="index.html" class="nav-link active">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> Layouts <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="layouts-normal.html" class="nav-link">
                                    <i class="icon icon-target"></i> Normal
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="layouts-fixed-sidebar.html" class="nav-link">
                                    <i class="icon icon-target"></i> Fixed Sidebar
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="layouts-fixed-header.html" class="nav-link">
                                    <i class="icon icon-target"></i> Fixed Header
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="layouts-hidden-sidebar.html" class="nav-link">
                                    <i class="icon icon-target"></i> Hidden Sidebar
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-energy"></i> UI Kits <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="alerts.html" class="nav-link">
                                    <i class="icon icon-energy"></i> Alerts
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="buttons.html" class="nav-link">
                                    <i class="icon icon-energy"></i> Buttons
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="cards.html" class="nav-link">
                                    <i class="icon icon-energy"></i> Cards
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="modals.html" class="nav-link">
                                    <i class="icon icon-energy"></i> Modals
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="tabs.html" class="nav-link">
                                    <i class="icon icon-energy"></i> Tabs
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="progress-bars.html" class="nav-link">
                                    <i class="icon icon-energy"></i> Progress Bars
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="widgets.html" class="nav-link">
                                    <i class="icon icon-energy"></i> Widgets
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-graph"></i> Charts <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="chartjs.html" class="nav-link">
                                    <i class="icon icon-graph"></i> Chart.js
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="forms.html" class="nav-link">
                            <i class="icon icon-puzzle"></i> Forms
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="tables.html" class="nav-link">
                            <i class="icon icon-grid"></i> Tables
                        </a>
                    </li>

                    <li class="nav-title">More</li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-umbrella"></i> Pages <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="blank.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Blank Page
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="login.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Login
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="register.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Register
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="invoice.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Invoice
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="404.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> 404
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="500.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> 500
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="settings.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Settings
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">54</span>
                                    <span class="font-weight-light">Total Users</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-people"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">$32,400</span>
                                    <span class="font-weight-light">Income</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">900</span>
                                    <span class="font-weight-light">Downloads</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-cloud-download"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">32s</span>
                                    <span class="font-weight-light">Time</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Total Users
                            </div>

                            <div class="card-body p-0">
                                <div class="p-4">
                                    <canvas id="line-chart" width="100%" height="20"></canvas>
                                </div>

                                <div class="justify-content-around mt-4 p-4 bg-light d-flex border-top d-md-down-none">
                                    <div class="text-center">
                                        <div class="text-muted small">Total Traffic</div>
                                        <div>12,457 Users (40%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">Banned Users</div>
                                        <div>95,333 Users (5%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">Page Views</div>
                                        <div>957,565 Pages (50%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">Total Downloads</div>
                                        <div>957,565 Files (100 TB)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Hoverable Table
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <table id="example" class="table table-hover " cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Position</th>
                                          <th>Office</th>
                                          <th>Age</th>
                                          <th>Start date</th>
                                          <th>Salary</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                          <th>Name</th>
                                          <th>Position</th>
                                          <th>Office</th>
                                          <th>Age</th>
                                          <th>Start date</th>
                                          <th>Salary</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
                                      <tr>
                                          <td>Tiger Nixon</td>
                                          <td>System Architect</td>
                                          <td>Edinburgh</td>
                                          <td>61</td>
                                          <td>2011/04/25</td>
                                          <td>$320,800</td>
                                      </tr>
                                      <tr>
                                          <td>Garrett Winters</td>
                                          <td>Accountant</td>
                                          <td>Tokyo</td>
                                          <td>63</td>
                                          <td>2011/07/25</td>
                                          <td>$170,750</td>
                                      </tr>
                                      <tr>
                                          <td>Ashton Cox</td>
                                          <td>Junior Technical Author</td>
                                          <td>San Francisco</td>
                                          <td>66</td>
                                          <td>2009/01/12</td>
                                          <td>$86,000</td>
                                      </tr>
                                      <tr>
                                          <td>Cedric Kelly</td>
                                          <td>Senior Javascript Developer</td>
                                          <td>Edinburgh</td>
                                          <td>22</td>
                                          <td>2012/03/29</td>
                                          <td>$433,060</td>
                                      </tr>
                                      <tr>
                                          <td>Airi Satou</td>
                                          <td>Accountant</td>
                                          <td>Tokyo</td>
                                          <td>33</td>
                                          <td>2008/11/28</td>
                                          <td>$162,700</td>
                                      </tr>
                                      <tr>
                                          <td>Brielle Williamson</td>
                                          <td>Integration Specialist</td>
                                          <td>New York</td>
                                          <td>61</td>
                                          <td>2012/12/02</td>
                                          <td>$372,000</td>
                                      </tr>
                                      <tr>
                                          <td>Herrod Chandler</td>
                                          <td>Sales Assistant</td>
                                          <td>San Francisco</td>
                                          <td>59</td>
                                          <td>2012/08/06</td>
                                          <td>$137,500</td>
                                      </tr>
                                      <tr>
                                          <td>Rhona Davidson</td>
                                          <td>Integration Specialist</td>
                                          <td>Tokyo</td>
                                          <td>55</td>
                                          <td>2010/10/14</td>
                                          <td>$327,900</td>
                                      </tr>
                                      <tr>
                                          <td>Colleen Hurst</td>
                                          <td>Javascript Developer</td>
                                          <td>San Francisco</td>
                                          <td>39</td>
                                          <td>2009/09/15</td>
                                          <td>$205,500</td>
                                      </tr>
                                      <tr>
                                          <td>Sonya Frost</td>
                                          <td>Software Engineer</td>
                                          <td>Edinburgh</td>
                                          <td>23</td>
                                          <td>2008/12/13</td>
                                          <td>$103,600</td>
                                      </tr>
                                      <tr>
                                          <td>Jena Gaines</td>
                                          <td>Office Manager</td>
                                          <td>London</td>
                                          <td>30</td>
                                          <td>2008/12/19</td>
                                          <td>$90,560</td>
                                      </tr>
                                      <tr>
                                          <td>Quinn Flynn</td>
                                          <td>Support Lead</td>
                                          <td>Edinburgh</td>
                                          <td>22</td>
                                          <td>2013/03/03</td>
                                          <td>$342,000</td>
                                      </tr>
                                      <tr>
                                          <td>Charde Marshall</td>
                                          <td>Regional Director</td>
                                          <td>San Francisco</td>
                                          <td>36</td>
                                          <td>2008/10/16</td>
                                          <td>$470,600</td>
                                      </tr>
                                      <tr>
                                          <td>Haley Kennedy</td>
                                          <td>Senior Marketing Designer</td>
                                          <td>London</td>
                                          <td>43</td>
                                          <td>2012/12/18</td>
                                          <td>$313,500</td>
                                      </tr>
                                      <tr>
                                          <td>Tatyana Fitzpatrick</td>
                                          <td>Regional Director</td>
                                          <td>London</td>
                                          <td>19</td>
                                          <td>2010/03/17</td>
                                          <td>$385,750</td>
                                      </tr>
                                      <tr>
                                          <td>Michael Silva</td>
                                          <td>Marketing Designer</td>
                                          <td>London</td>
                                          <td>66</td>
                                          <td>2012/11/27</td>
                                          <td>$198,500</td>
                                      </tr>
                                      <tr>
                                          <td>Paul Byrd</td>
                                          <td>Chief Financial Officer (CFO)</td>
                                          <td>New York</td>
                                          <td>64</td>
                                          <td>2010/06/09</td>
                                          <td>$725,000</td>
                                      </tr>
                                      <tr>
                                          <td>Gloria Little</td>
                                          <td>Systems Administrator</td>
                                          <td>New York</td>
                                          <td>59</td>
                                          <td>2009/04/10</td>
                                          <td>$237,500</td>
                                      </tr>
                                      <tr>
                                          <td>Bradley Greer</td>
                                          <td>Software Engineer</td>
                                          <td>London</td>
                                          <td>41</td>
                                          <td>2012/10/13</td>
                                          <td>$132,000</td>
                                      </tr>
                                      <tr>
                                          <td>Dai Rios</td>
                                          <td>Personnel Lead</td>
                                          <td>Edinburgh</td>
                                          <td>35</td>
                                          <td>2012/09/26</td>
                                          <td>$217,500</td>
                                      </tr>
                                      <tr>
                                          <td>Jenette Caldwell</td>
                                          <td>Development Lead</td>
                                          <td>New York</td>
                                          <td>30</td>
                                          <td>2011/09/03</td>
                                          <td>$345,000</td>
                                      </tr>
                                      <tr>
                                          <td>Yuri Berry</td>
                                          <td>Chief Marketing Officer (CMO)</td>
                                          <td>New York</td>
                                          <td>40</td>
                                          <td>2009/06/25</td>
                                          <td>$675,000</td>
                                      </tr>
                                      <tr>
                                          <td>Caesar Vance</td>
                                          <td>Pre-Sales Support</td>
                                          <td>New York</td>
                                          <td>21</td>
                                          <td>2011/12/12</td>
                                          <td>$106,450</td>
                                      </tr>
                                      <tr>
                                          <td>Doris Wilder</td>
                                          <td>Sales Assistant</td>
                                          <td>Sidney</td>
                                          <td>23</td>
                                          <td>2010/09/20</td>
                                          <td>$85,600</td>
                                      </tr>
                                      <tr>
                                          <td>Angelica Ramos</td>
                                          <td>Chief Executive Officer (CEO)</td>
                                          <td>London</td>
                                          <td>47</td>
                                          <td>2009/10/09</td>
                                          <td>$1,200,000</td>
                                      </tr>
                                      <tr>
                                          <td>Gavin Joyce</td>
                                          <td>Developer</td>
                                          <td>Edinburgh</td>
                                          <td>42</td>
                                          <td>2010/12/22</td>
                                          <td>$92,575</td>
                                      </tr>
                                      <tr>
                                          <td>Jennifer Chang</td>
                                          <td>Regional Director</td>
                                          <td>Singapore</td>
                                          <td>28</td>
                                          <td>2010/11/14</td>
                                          <td>$357,650</td>
                                      </tr>
                                      <tr>
                                          <td>Brenden Wagner</td>
                                          <td>Software Engineer</td>
                                          <td>San Francisco</td>
                                          <td>28</td>
                                          <td>2011/06/07</td>
                                          <td>$206,850</td>
                                      </tr>
                                      <tr>
                                          <td>Fiona Green</td>
                                          <td>Chief Operating Officer (COO)</td>
                                          <td>San Francisco</td>
                                          <td>48</td>
                                          <td>2010/03/11</td>
                                          <td>$850,000</td>
                                      </tr>
                                      <tr>
                                          <td>Shou Itou</td>
                                          <td>Regional Marketing</td>
                                          <td>Tokyo</td>
                                          <td>20</td>
                                          <td>2011/08/14</td>
                                          <td>$163,000</td>
                                      </tr>
                                      <tr>
                                          <td>Michelle House</td>
                                          <td>Integration Specialist</td>
                                          <td>Sidney</td>
                                          <td>37</td>
                                          <td>2011/06/02</td>
                                          <td>$95,400</td>
                                      </tr>
                                      <tr>
                                          <td>Suki Burks</td>
                                          <td>Developer</td>
                                          <td>London</td>
                                          <td>53</td>
                                          <td>2009/10/22</td>
                                          <td>$114,500</td>
                                      </tr>
                                      <tr>
                                          <td>Prescott Bartlett</td>
                                          <td>Technical Author</td>
                                          <td>London</td>
                                          <td>27</td>
                                          <td>2011/05/07</td>
                                          <td>$145,000</td>
                                      </tr>
                                      <tr>
                                          <td>Gavin Cortez</td>
                                          <td>Team Leader</td>
                                          <td>San Francisco</td>
                                          <td>22</td>
                                          <td>2008/10/26</td>
                                          <td>$235,500</td>
                                      </tr>
                                      <tr>
                                          <td>Martena Mccray</td>
                                          <td>Post-Sales support</td>
                                          <td>Edinburgh</td>
                                          <td>46</td>
                                          <td>2011/03/09</td>
                                          <td>$324,050</td>
                                      </tr>
                                      <tr>
                                          <td>Unity Butler</td>
                                          <td>Marketing Designer</td>
                                          <td>San Francisco</td>
                                          <td>47</td>
                                          <td>2009/12/09</td>
                                          <td>$85,675</td>
                                      </tr>
                                      <tr>
                                          <td>Howard Hatfield</td>
                                          <td>Office Manager</td>
                                          <td>San Francisco</td>
                                          <td>51</td>
                                          <td>2008/12/16</td>
                                          <td>$164,500</td>
                                      </tr>
                                      <tr>
                                          <td>Hope Fuentes</td>
                                          <td>Secretary</td>
                                          <td>San Francisco</td>
                                          <td>41</td>
                                          <td>2010/02/12</td>
                                          <td>$109,850</td>
                                      </tr>
                                      <tr>
                                          <td>Vivian Harrell</td>
                                          <td>Financial Controller</td>
                                          <td>San Francisco</td>
                                          <td>62</td>
                                          <td>2009/02/14</td>
                                          <td>$452,500</td>
                                      </tr>
                                      <tr>
                                          <td>Timothy Mooney</td>
                                          <td>Office Manager</td>
                                          <td>London</td>
                                          <td>37</td>
                                          <td>2008/12/11</td>
                                          <td>$136,200</td>
                                      </tr>
                                      <tr>
                                          <td>Jackson Bradshaw</td>
                                          <td>Director</td>
                                          <td>New York</td>
                                          <td>65</td>
                                          <td>2008/09/26</td>
                                          <td>$645,750</td>
                                      </tr>
                                      <tr>
                                          <td>Olivia Liang</td>
                                          <td>Support Engineer</td>
                                          <td>Singapore</td>
                                          <td>64</td>
                                          <td>2011/02/03</td>
                                          <td>$234,500</td>
                                      </tr>
                                      <tr>
                                          <td>Bruno Nash</td>
                                          <td>Software Engineer</td>
                                          <td>London</td>
                                          <td>38</td>
                                          <td>2011/05/03</td>
                                          <td>$163,500</td>
                                      </tr>
                                      <tr>
                                          <td>Sakura Yamamoto</td>
                                          <td>Support Engineer</td>
                                          <td>Tokyo</td>
                                          <td>37</td>
                                          <td>2009/08/19</td>
                                          <td>$139,575</td>
                                      </tr>
                                      <tr>
                                          <td>Thor Walton</td>
                                          <td>Developer</td>
                                          <td>New York</td>
                                          <td>61</td>
                                          <td>2013/08/11</td>
                                          <td>$98,540</td>
                                      </tr>
                                      <tr>
                                          <td>Finn Camacho</td>
                                          <td>Support Engineer</td>
                                          <td>San Francisco</td>
                                          <td>47</td>
                                          <td>2009/07/07</td>
                                          <td>$87,500</td>
                                      </tr>
                                      <tr>
                                          <td>Serge Baldwin</td>
                                          <td>Data Coordinator</td>
                                          <td>Singapore</td>
                                          <td>64</td>
                                          <td>2012/04/09</td>
                                          <td>$138,575</td>
                                      </tr>
                                      <tr>
                                          <td>Zenaida Frank</td>
                                          <td>Software Engineer</td>
                                          <td>New York</td>
                                          <td>63</td>
                                          <td>2010/01/04</td>
                                          <td>$125,250</td>
                                      </tr>
                                      <tr>
                                          <td>Zorita Serrano</td>
                                          <td>Software Engineer</td>
                                          <td>San Francisco</td>
                                          <td>56</td>
                                          <td>2012/06/01</td>
                                          <td>$115,000</td>
                                      </tr>
                                      <tr>
                                          <td>Jennifer Acosta</td>
                                          <td>Junior Javascript Developer</td>
                                          <td>Edinburgh</td>
                                          <td>43</td>
                                          <td>2013/02/01</td>
                                          <td>$75,650</td>
                                      </tr>
                                      <tr>
                                          <td>Cara Stevens</td>
                                          <td>Sales Assistant</td>
                                          <td>New York</td>
                                          <td>46</td>
                                          <td>2011/12/06</td>
                                          <td>$145,600</td>
                                      </tr>
                                      <tr>
                                          <td>Hermione Butler</td>
                                          <td>Regional Director</td>
                                          <td>London</td>
                                          <td>47</td>
                                          <td>2011/03/21</td>
                                          <td>$356,250</td>
                                      </tr>
                                      <tr>
                                          <td>Lael Greer</td>
                                          <td>Systems Administrator</td>
                                          <td>London</td>
                                          <td>21</td>
                                          <td>2009/02/27</td>
                                          <td>$103,500</td>
                                      </tr>
                                      <tr>
                                          <td>Jonas Alexander</td>
                                          <td>Developer</td>
                                          <td>San Francisco</td>
                                          <td>30</td>
                                          <td>2010/07/14</td>
                                          <td>$86,500</td>
                                      </tr>
                                      <tr>
                                          <td>Shad Decker</td>
                                          <td>Regional Director</td>
                                          <td>Edinburgh</td>
                                          <td>51</td>
                                          <td>2008/11/13</td>
                                          <td>$183,000</td>
                                      </tr>
                                      <tr>
                                          <td>Michael Bruce</td>
                                          <td>Javascript Developer</td>
                                          <td>Singapore</td>
                                          <td>29</td>
                                          <td>2011/06/27</td>
                                          <td>$183,000</td>
                                      </tr>
                                      <tr>
                                          <td>Donna Snider</td>
                                          <td>Customer Support</td>
                                          <td>New York</td>
                                          <td>27</td>
                                          <td>2011/01/25</td>
                                          <td>$112,000</td>
                                      </tr>
                                  </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script src="{{asset('js/dashboard/chart.min.js')}}"></script>
<script src="{{asset('js/dashboard/carbon.js')}}"></script>
<script src="{{asset('js/dashboard/demo.js')}}"></script>
</body>
</html>
