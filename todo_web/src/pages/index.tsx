import Head from "next/head";
import { useRouter } from "next/router";

export const Home: React.FC = () => {
  const router = useRouter();

  return (
    <div className="container">
      <Head>
        <title>Create Next App</title>
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <main>
        <button
          onClick={() => {
            router.push("TodoList");
          }}
        >
          Test Button
        </button>
      </main>
    </div>
  );
};

export default Home;
