import { useRouter } from "next/router";
import styles from "./Login.module.css";

export const Login: React.FC = () => {
  const router = useRouter();
  const pushLogin = () => {
    router.push("/");
  };

  return (
    <>
      <h1>Login</h1>
      <div className={styles.loginForm}>
        <input className={styles.loginInput} />
        <input className={styles.loginInput} />
        <div>
          <button className={styles.backButton} onClick={() => router.back()}>
            back
          </button>
          <button className={styles.loginButton} onClick={pushLogin}>
            Login
          </button>
        </div>
      </div>
    </>
  );
};

export default Login;
