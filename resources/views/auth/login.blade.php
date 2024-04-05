@extends('layouts.login_register');

@section('content')
    <div class="login">
        <div class="container">
            <div class="form-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group">
                        <label for="email">Account:</label>
                        <input type="text" id="username" name="email" placeholder="Email address or member ID"
                            @error('email') class="is-invalid" @enderror value="{{ old('email') }}" required autocomplete="email"
                            autofocus>
                    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <input type="password" id="password" name="password" placeholder="password"
                            @error('password') class="is-invalid" @enderror required autocomplete="current-password">
                    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="checkbox-group">
                        <input class="checkbox" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                    
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="button-group">
                        <button type="submit">Sign in</button>
                    </div>
                    <div class="divider">
                        <a href="">Mobile number sign in</a>
                        <a href="">Create account</a>
                    </div>
                    <div class="social-login">
                        <span>Sign in with:</span>
                        <a href="#">
                            <img src="https://static.wixstatic.com/media/a65522_3871e4e18d164c99a87d024068e540b3~mv2.png/v1/fill/w_139,h_134,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/FacebookLogo.png"
                                alt="">
                        </a>
                        <a href="#">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMwAAADACAMAAAB/Pny7AAABQVBMVEX////nQjY2plNChPL3ugk3f/Lk7v90ovcteu+av/6Vu/72tQD1+P9zo/uArP73uAB+q/jmOy7/+u3lNCb/+vkso0wFnTn/vAAhoEX4/PnlLx/+7Ov+ysfmOjcnePF8p/fr8/+/4sf81dPkIgv9393pSj/yjIb0cmrqX1f1rhPwkCH5xQD70nXoTzP+9Nv8xzr/5aNQi/LZ5v+03b0UpFdJp1BDrF7K5tBZtW+Gypbp9Ot6woo9l6U2qEZDgfv8trPyW1H2gXr3p6P0mJP5t3XkHCL702PynRzpXDHscivvhCX+3pL4xlj/6LP/7cXlJzrrXg3E2f5elvasyf7iugD8zE/btyF0qDLCsyyjsDiHrUFfqUxqvX60sjK4zobJ4OgypWgwjrU4noY8idc+kMSe1Ko5i804oXQ1qjgxmJB8rOh/z/3/AAAKpklEQVR4nO2ceXsSSR7Hm6abkECETtPcEm5wotEEBwKIXLvjqDPuhOiMR9x1VXZ03/8L2KrmCEfTXXf35NnvP/rkSXX1h99ZB5EkSmX6g7TmYyNdHxZjtC9ErFhxmC6xQjFxSoN+xg2eWCZbL6UZkpjSSumReJxyf1DSWaOYSuvjslAciMLSvzZwfGNxwVMe1TmimDiDcVEISqZf0/miAGnp+ijDHSWWHWp8YmVDuq/W58xSHla4W2WJUxlyNc6oogljAb6mD/gZJzPgHyybOLyMM+KcwiyVrmQ5oGRqJfEoPpjXRqxrTixbYd66oKpUZetqmZHIwN+iqbGsoJmq6MhfV3rALnCKNddcbC7dxypHZ+tus8AczYZmVBHSvjhI01h42tjnargspdXpM7TLoX8jrUINM/SCi5nSa7eHRfNRGibmIRad0iyxsfspeS69QtnRxEaesYtep2XpeyQnw9gv07KIWx87iJpFKg684mT0LOW6V1jS1Cwx1/vkhejtIlU9w1KnZum7s9zflkZbX0DAMGTRdL20UBq3adU0+tU/GwogXdfq1XE/my2Wy8VsdlQdgJ9AoT6Cvusf0hcY8LqVQW1kcTCRKY6Gg4oPhYe6twSirvyaVqkPrUCWKo+G9YqTz+kDeh8r16lYNN1Xr/adU1C5Xx3YHicwyGNSrErDoqUHKCQzFUe13TgM6gtwMoqWTC/VR1kcPy/3dx320Nd9+PgacRujlWp97J3HTH9odY9AZ7GHGRuTsmilepbow8z061s4THxMKpJmsnSlT5p7YplRev0jZBH74FMiXPTr6TFNGo2V145LtAELFilL1seUBtQe3r+5IaHpTE4wMmSZLD1iMfdg3qhraTZnSyMSw2gVJk4Bcg9scTSdQT8GlSFYxGi+IZO5obK1iq9Cuw+zEMGKTK+wcLGFYtlRn9H5ZQbfyfQ6j6NgFvrb3+/isjA9a2Sp09APPjwaNnWai36KKM9+xqHxMMupElGUe8/RaTQmPQcf3QcsihJ6cRcRh1V54aGjhyaMojxDDJySV2Mf6KUyhzlRkAKnxPtiG4WOfpmzQByEwClV3X5jG/368AZGOXHM0Xrd7Re20/0VFkBz74FtHmCwacpRp2/WYEBWe25Ho3u1iTH1SNmAUZQXD3bSpMfuff3AWUf3t1iU3e0AmxU6N716aAED2wFLHEb3i3jpkRULCBzLrJbme9mYVkf3Q5Ywlu2AxuU2KztZe9nMOD//Y9MwVS9HP6iYuwwDdPJinUZjeFuSh3Z7mUnzbM3T9LHbr2uv091eNne1uyuG8XCzDPXKngXo+TIPaF5uMIGOXtp52Uw/LNoBj6cy6eiNM8yiHdBq3k5ls8W/k07uPTct4+3ijxIypkA74PHWHyiFEDJzV3twl92+Mh8hhczcOL95PC9LR2heZiri9ss66RTZMErovtsv66RHGDCviGcJ7x/uQd25EzV1Z03RhQ5utG+vg02dw2lsG7MNGPKPLHyYC0KpwdV/GCoXDYNpNrcybFjeUMDsqX6uUv0Q5gQd5qWHYfy5AJgGPZlRhIwImEusZBY58jJMcB80M8gwkYcUTWb4kDvMMQ5M6CdyFgEw6hlOmaGJfwEw/lxYQm4zldCvHocJYNTM0KnHYS7hGfPtgXHYmVkRTWYWAQNyMzJMRPE6TFRCtQsoMx6HUffQYUKeh5ncIhj/rYI5u00w/v/D/PVhPJ+aAcztKZq3DQZ9c0ahajQnImBELQHORBRNjMUZxeaMIBiMZfMjKhjuLKDRxNjQoNk2FwETFbbVxN/NwOJM1CagAJgrKSbkREMK+0XsAUgoZ81zGIoMIALmXJIwjjRpjjQEwAQkjEJDddjEGwXASPb3szZhyIMmz51FnUiiDmj5ZzNQMyXpCD0DJF4Tw0hXQZVAGDDwfAbjUkPi9z865KbZPz48nAAdzo6dHXV8vHeI02rDzCzFEDNAIvL2w+M2uWmkfODcVABN+XwgcH4QRIeBZ5qIGSChvPtRNpopChoSoVtGzcPfP0VzsfcyVEMwDPICVZ3Ao3MQNI4ZIJJ4+8FkMa4FwyAbJngwg3EMmkjiozxXsyWUJZxDhcldzUY4rQIiyvvHCxiDJgXg6wod5nw2wuFeY+i1vGSRjQuhpsFY0gVmI2wvaYNweXzDIstJkabJI2dmdS8/H2OTnBPKx1UUwabZRy6awf3wfMzOLzZEIr9/WGeBphFXa9C9LHi5GLPLzyLK2x83WUDhLIhiuUJmUc/Ol6Os95sSr0HR31ayS96h4Qn98pB6HFiOsvSzRdHfktEQ42iXGF52dTPM4gt0y6JvAXMhxjRRZBa/erkybuurjZGEpYuJzAEYhlEn5ysDN790mlB2mWVGI6DfzB+jL2bUg/Dq0HU/S6wWfUsa/o52hbEwWw0ZaeOL2omP9igwP/NmOcdYZaqTy7Wxq1+hT7x3YgGm4bwWyEfR15h+NRpeH7344wZWRd9Kcb5hc4XB4levNkbP/+yEZdG3tg3PRuAca2dqw8ukeQqIvH6HRGKKX8cZwDrOVY/Dmw84tSv6VuLXP4dxAgZo08uAfoFFH83FONPgsaiTwPYjTkPvEMOFM80+8lp5BhO1esg/k1govGiwEhnUVvhDdeK4MDwWNziV39TE+jldbNPIhsG43mCzWIU/FIFpQPVkusOBvupf6OmOJ6Xa+KYB1dNg1nWGo3ix75+fZFiqYxDAyEa8wGZ9c76HG/sAZqtgLpSakjgadDUGxun8a4JtF3/wwOaBF0S2kZPNBiVOp9X99G/8I+nZQcYONchgQFbrtih8LdXqJpM94wnuyefuiDE/IKIcMDNOm7SCplpTGU5r9D5/eYpHY9HJrKhF6GjgVZIXbZJMkCq0m8n5pL0/v+LQ5HbUmOWjp6QwEKfZxd1T6zS6TeNmyl7zyVP0rT+rFnP96dekjgZxDPl6ipEKWu0L2TDWn/DZj5qgc5Zd2foETXLbwLeRm9doqa3TuGjK23MZn87QXC0YzTtPQuFo89cxjIupfTZItdrAu6wnMgzEwHE2DBCNoy1eKBmPN6cFSwt1Cm05Hrebo/ck5xw4QYfoX8xG52irQPHmdbfdaBRMNRrT9gX8YdLp+b3PjhVHPc4jwUgtetMsiYxkEr6/KfDfHa61RfPpPw40Z0hOBkXYozFUr+nQ3KA5mSmCdRpjGT275sZie2m3qKoNK5rdzc36GYYzzYXrNDbNjYocMDNR1k42NDuaG8SsvKKCRXUWLUP+btEO5Cx3yuzVQEyjfHH+3Aqc4CFG8C81dT9s4NbcRuAEJyQsXqHpPVm9eaqe5YlYGPScTPRtpblRz5zWMHY0XsD59unL3DiYBWaTxgM5DeTo3lczq9GxgJzmCRr52/cvZ0/VPToWUG880AvIsIB+//pf8nhZqOV+n2bq2zWLTe1O1/UVgQyvHrDZoO+0HdeG3BVnxCJJKddbm3iX4U2qQtPVwIlPmd4Kc3OBY7C/3OJaN2DwuLTfarqBYxjMQn9Nqbb45afRxNm8xlLhWqxxDOOC4+2pzlRkIkjK3MwyU6stC8Ix4l1G59i71Sl0hTQESX7RsobTaHLv1pLGlObIF0OpTiPOFScZpzq9xlVnyg8nGb8WiQKVmvLJBAZps/8/Ai7PaA588hMAAAAASUVORK5CYII="
                                alt="">
                        </a>
                        <a href="#">
                            <img src="data:image/png;base64,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"
                                alt="">
                        </a>
                        <a href="">
                            <img src="data:image/png;base64,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"
                                alt="">
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
