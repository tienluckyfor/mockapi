import {Helmet} from "react-helmet";

const AppHelmet = ({title}) => {
    return (
        <Helmet
            titleTemplate={`%s - ${process.env.REACT_APP_NAME}`}
        >
            {!!title && <title>{title}</title>}
            <html lang="en-US"/>
            <meta charSet="UTF-8"/>
            <link rel="icon" type="image/png" href={`${process.env.PUBLIC_URL}/assets/icon-128x128.png`}/>
            <link rel="apple-touch-icon" href={`${process.env.PUBLIC_URL}/assets/icon-128x128.png`}/>
            <meta name="description" content={`${process.env.REACT_APP_NAME} is the easiest and quickest way to create REST API servers. No remote deployment, no account required, free, open source and cross-platform.`} />
        </Helmet>
    )
}

export default AppHelmet