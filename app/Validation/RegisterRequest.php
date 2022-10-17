namespace App\Validation;

use Illuminate\Support\Facades\Validator;

Trait RegisterRequest
{
    public function inputDataSanitization($data)
    {
        $validator = Validator::make($data, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'password'   => 'required|min:6|confirmed',
            'confirm_password' => 'required|confirmed',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return $validator;
    }

    public function loginDataSanitization($data)
    {
        $validator = Validator::make($data, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return $validator;
    }
    
}