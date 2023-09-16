import 'bootstrap/dist/css/bootstrap.css';
import '@/styles/globals.css'
import '@/styles/header.css'
import '@/styles/footer.css'
import { useEffect } from 'react';
import {ServiceApiProvider} from "@/services/context";
export default function App({ Component, pageProps }) {
  useEffect(() => {
    import('bootstrap/dist/js/bootstrap');
  }, []);
  return (
      <ServiceApiProvider>
        <Component {...pageProps} />
      </ServiceApiProvider>
  );
}
