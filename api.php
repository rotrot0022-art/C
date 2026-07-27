<?php
// রেসপন্স হেডার JSON হিসেবে সেট করা
header('Content-Type: application/json; charset=utf-8');

// ১. এখানে আপনার ভ্যালিড কি-গুলোর তালিকা (Key List) রাখুন
$valid_keys = array(
    "VIP-KEY-1111",
    "PREMIUM-2026-XYZ",
    "USER-ABC-999"
);

// ২. অ্যাপ থেকে পাঠানো Key সংগ্রহ করা
$user_key = '';
if (isset($_REQUEST['key'])) {
    $user_key = trim($_REQUEST['key']);
}

// এক্সপায়ারি ডেট (মেয়াদ শেষ হওয়ার তারিখ)
$expire_date = "2030-12-31 23:59:59"; 

// ৩. কি (Key) ভ্যালিডেশন চেক করা
// (যদি আপনি চান যেকোনো কি দিলেই কাজ করুক, তবে নিচের `if` শর্তটি উঠিয়ে শুধু রেসপন্স রেখে দিতে পারেন)
if (in_array($user_key, $valid_keys) || !empty($user_key)) {
    // কি সঠিক হলে বা ফিল্ড ফাঁকা না থাকলে এই রেসপন্স যাবে
    $response = array(
        "status" => true,
        "success" => true,
        "message" => "Login Successful",
        "key" => $user_key,
        "expire_date" => $expire_date,
        "status_code" => 200,
        "s" => "success",
        "x" => "valid",
        "y" => "valid",
        "z" => "valid"
    );
} else {
    // কি ভুল হলে এই রেসপন্স যাবে
    $response = array(
        "status" => false,
        "success" => false,
        "message" => "Invalid or Expired Key!",
        "status_code" => 400
    );
}

// JSON ফরম্যাটে আউটপুট প্রিন্ট করা
echo json_encode($response);
exit();
?>
