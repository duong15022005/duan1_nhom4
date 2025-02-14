<?php
// Controller
require_once './models/AdminHome.php';
class AdminHomeController
{
    public $adminHome;


    public function __construct()
    {
        $this->adminHome = new AdminHome();
    }

    public function home()
    {
        // Fetch total products, completed orders, total users, total revenue
        $totalProducts = $this->adminHome->getTotalProducts();
        $totalUsers = $this->adminHome->getTotalUsers();
        $totalCompletedOrders = $this->adminHome->getTotalCompletedOrders();
        $totalRevenue = $this->adminHome->getTotalRevenue();

        // Fetch daily revenue data
        $dailyOrderStatistics = $this->adminHome->getDailyRevenue();

        // Pass data to the view
        include './views/home.php';
    }
}
?>