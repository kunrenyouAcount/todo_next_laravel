import { useRouter } from "next/router";
import styles from "./Register.module.css";

export const Register: React.FC = () => {
  const router = useRouter();
  const pushRegister = () => {
    router.push("/");
  };

  return (
    <>
      <h1>Register</h1>
      <div className={styles.registerForm}>
        <input className={styles.registerInput} />
        <input className={styles.registerInput} />
        <div>
          <button className={styles.backButton} onClick={() => router.back()}>
            back
          </button>
          <button className={styles.registerButton} onClick={pushRegister}>
            Register
          </button>
        </div>
      </div>
    </>
  );
};

export default Register;
