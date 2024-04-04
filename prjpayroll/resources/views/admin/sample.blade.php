@php
    use App\Models\User;
    use App\Models\Employee;

    $user = Employee::find(1);
    dd($user->user->is(auth()->user()));
    /*$adminId = 1; // Assuming the ID of the admin you want to retrieve data for is 1
    $admin = Employee::find(1);
    dd($admin);
    if ($admin) {
        // Retrieve all employees created by this admin
        $employees = $admin->employees;
        foreach ($employees as $employee) {
            dd($employee->is(auth()->user()));
            echo $employee->userName . "<br>";
            // Access other properties of the employee as needed
        }
    } else {
        // Admin with the given ID not found
    }*/
@endphp