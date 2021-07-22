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
        <h1>Home</h1>
        <button
          onClick={() => {
            router.push("/Register");
          }}
        >
          Register
        </button>
        <button
          onClick={() => {
            router.push("/Login");
          }}
        >
          Login
        </button>
        <button
          onClick={() => {
            router.push("TodoList");
          }}
        >
          Todo
        </button>
      </main>
    </div>
  );
};

export default Home;
