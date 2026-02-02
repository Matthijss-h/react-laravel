import { Head, Link, usePage } from '@inertiajs/react';
import logo from '/public/logo.png';
import bubbles from '/public/bubbles.png';
import { dashboard, login, register, network, home } from '@/routes';
import { type SharedData } from '@/types';

export default function Welcome({
    canRegister = true,
}: {
    canRegister?: boolean;
}) {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Welcome">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
               <header className="fixed top-0 w-full z-50 bg-white/80">
                 <nav className=" relative flex items-center justify-between px-6 py-3 max-w mx-auto h-16">
    
                <Link href={home()} className="absolute left-5 top-1 -translate-y-0.5">
      <img src={logo} alt="Your Company" className="h-40 w-auto" />
      </Link>

    <div className="ml-auto flex items-center gap-3">
      {auth.user ? (
        <Link
          href={dashboard()}
          className="rounded-md border px-4 py-2 text-sm hover:bg-black/5 transition">
          Dashboard
        </Link>
    
        ) : (

        <>
          <Link href={login()} className="rounded-md px-4 py-2 text-sm hover:bg-black/5 transition">
            Log in
          </Link>

          {canRegister && (
            <Link href={register()} className="rounded-md bg-[#E1A07F] px-7 py-3 text-sm hover:bg-[#d6906d] transition">
              Registreren
            </Link>
          )}
        </>
      )}
    </div>
  </nav>
</header>
            <div className="flex w-full items-center min-h-screen bg-background justify-center">
                <main className="flex w-full justify-center lg:max-w-4xl lg:flex-row">
                <img src={bubbles} alt="Bubbles" className="absolute left-1 h-55" />
                    <Link
                        href={network()}
                        className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#000000] dark:hover:border-[#000000]">
                        Open Network
                    </Link>
                </main>
            </div>
        </>
    );
}
