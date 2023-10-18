<table style="width: 100%;">
    <tr>
        <td>
            <div style="background-color: #f9fafb; padding: 64px 16px;">
                <img src="{{ asset('logo.png') }}" alt="PROFESSIONEL BROTHERS LOGO"
                    style="display: block; width: 160px; margin: 0 auto 60px auto;" />
                <section
                    style="
						background-color: #ffffff;
						color: #030712;
						border-radius: 16px;
						width: 500px;
						max-width: 100%;
						padding: 32px;
						margin: 0 auto;
						border: 1px solid #e5e7eb;
						box-shadow: 0 0 #0000, 0 0 #0000, 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
					">
                    <h1
                        style="
							margin: 0;
							font-family: Tahoma, Verdana, Segoe, sans-serif;
							font-size: 26px;
							font-weight: 900;
							letter-spacing: normal;
							text-align: center;
						">
                        {{ __('Did you forget your password?') }}
                    </h1>
                    <p style="margin: 24px 0 18px 0; font-size: 18px; text-align: center; font-weight: 400;">
                        {{ __('No need to worry, we\'ve got you covered! Let us provide you with a new password.') }}
                    </p>
                    <a href="{{ route('views.reset.show', $data['token']) }}" target="_blank"
                        style="
							text-decoration: none;
							display: block;
							color: #ffffff;
							background-color: #115e7f;
							border-radius: 16px;
							width: max-content;
							font-weight: 900;
							font-family: Tahoma, Verdana, Segoe, sans-serif;
							font-size: 20px;
							padding: 16px 40px;
							margin: 0 auto;
						">
                        {{ __('Reset Password') }}
                    </a>
                </section>
                <p style="margin: 40px 0 0 0; font-size: 16px; text-align: center; color: #030712;">
                    {{ __('If you didn\'t request a password change, you can ignore this email.') }}
                </p>
            </div>
        </td>
    </tr>
</table>
