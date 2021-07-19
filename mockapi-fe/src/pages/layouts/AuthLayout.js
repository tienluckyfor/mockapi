import {Divider, PageHeader} from "antd";
import AppHelmet from "shared/AppHelmet";
import Cookies from "universal-cookie";

const AuthLayout = ({onBack, title, children, linkButton}) => {
    const cookies = new Cookies()
    if (cookies.get('mockapi-token')){
        window.location.assign(`/ApiListPage`)
    }

    return (
        <>
            <AppHelmet title={title}/>
            <main className="lg:mt-20 mt-0 mx-auto max-w-sm lg:border border-indigo-200 py-5 lg:shadow-lg relative">
                <PageHeader
                    // onBack={() => null}
                    onBack={onBack}
                    title={title}
                    className="px-5"
                />
                <div className="px-5">
                    {children}
                </div>
                {linkButton &&
                <>
                    <Divider plain/>
                    <section className="px-5 ">
                        {linkButton}
                        {/*<div className="flex items-center justify-between mt-4 ">
                            <Button className="w-1/2 mr-2">Facebook</Button>
                            <Button className="w-1/2 ml-2">Google</Button>
                        </div>*/}
                    </section>
                </>
                }
            </main>
        </>
    )
}
export default AuthLayout