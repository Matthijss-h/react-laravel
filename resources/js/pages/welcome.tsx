import { Head, Link, usePage } from '@inertiajs/react';
import logo from '/public/logo.png';
import { dashboard, login, register, network, home} from '@/routes';
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

                <link
                    href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
                    rel="stylesheet"
                />
            </Head>
            <header className="fixed top-0 p-6 justify-between items-center w-full text-sm not-has-[nav]:hidden">
                <nav className="flex justify-end">
                <Link href={home()}>
                    <img src={logo} alt="Your Company" className="absolute left-1 top-0 h-45" />
                </Link>
        
        

                    {auth.user ? (
                        <Link
                            href={dashboard()}
                            className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                        >
                            Dashboard
                        </Link>
                    ) : (
                        <>
                            <Link
                                href={login()}
                                className="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#000000] dark:hover:border-[#3E3E3A]"
                            >
                                Log in
                            </Link>
                            {canRegister && (
                                <Link
                                    href={register()}
                                    className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#000000] dark:hover:border-[#62605b]"
                                >
                                    Registreren
                                </Link>
                            )}
                        </>
                    )}
                </nav>
                {/* <div className="p-0">
          <img src={logo} alt="Your Company" className="h-50" />
        </div> */}
            </header>
            <div className="flex w-full items-center min-h-screen bg-background justify-center">
                <main className="flex w-full justify-center lg:max-w-4xl lg:flex-row">
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
