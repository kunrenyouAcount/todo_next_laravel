import { Todo } from "../models/Todo";
import styles from "./TodoItem.module.css";

type Props = {
  todo: Todo;
  onClick?: () => void;
};

export const TodoItem: React.FC<Props> = ({ todo, onClick }) => {
  return (
    <div className={styles.todoItem} onClick={onClick}>
      <div className={styles.todoItemTitle}>{todo.title}</div>
      <div className={styles.todoItemDescription}>{todo.description}</div>
    </div>
  );
};
