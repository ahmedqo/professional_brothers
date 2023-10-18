<table style="width: 100%;">
    <tr>
        <td>
            <div style="background-color: #f9fafb; padding: 64px 16px;">
                <img src="{{ asset('logo.png') }}" alt="PROFESSIONEL BROTHERS LOGO"
                    style="display: block; width: 160px; margin: 0 auto 20px auto;" />
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
                    <table style="width: 100%">
                        <tr>
                            <td
                                style="padding-top:1rem;font-weight:900;font-size:1rem;text-align:{{ Sys::lang() ? 'start' : 'end' }}">
                                {{ __('Message') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:16px;text-align:{{ Sys::lang() ? 'start' : 'end' }}">
                                {{ $data['message'] }}
                            </td>
                        </tr>
                    </table>
            </div>
        </td>
    </tr>
</table>
