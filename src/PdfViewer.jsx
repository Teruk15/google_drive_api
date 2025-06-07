import {useEffect, useState} from "react";
import axios from "axios"

export default function PdfViewer () {
    const [pdf, setPdf] = useState([]);

    async function fetchPdfs() {
        const url = "http://localhost:8080/google_drive_API/api.php";
        try {
            const response = await axios.get(url);
            setPdf(response.data);
        }
        catch(error) {
            console.log("Error occurred while fetching PDF:", error);
        }
    }

    useEffect(() => {
        fetchPdfs();
    }, []);

    return (
        <>
            <h1>PDF Files</h1>
            <ul>
                {pdf.map((item, index) => (
                    <iframe
                        key={index}
                        src={item.url}
                        width={400}
                        height={600}
                        title={item.name}
                    >
                    </iframe>
                ))}
            </ul>
        </>
    );
    
}