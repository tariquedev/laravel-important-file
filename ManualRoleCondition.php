public function __construct()
    {
        $this->middleware(['auth', 'verified']);

        $this->middleware(function ($request, $next) {

            if (Auth::user()->type != 2)
                return redirect('/dashboard');
            return $next($request);

        });
    }
