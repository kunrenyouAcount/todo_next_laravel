import { useDispatch, useSelector } from "react-redux";
import { RootState } from "../../app/store";
import { useRouter } from "next/router";
import styles from "./TodoEdit.module.css";
import { useState } from "react";
import { Todo } from "../../models/Todo";
import { deleteTodo } from "../../modules/TodosModule";

const TodoEdit: React.FC = () => {
  const router = useRouter();
  const paramsId = router.query.id;
  if (typeof paramsId !== "string") {
    return;
  }
  const id = parseInt(paramsId);

  const { todos } = useSelector((state: RootState) => state.todos);
  const initTodo = todos.find((todo) => todo.id === id);
  const [todo, setTodo] = useState<Todo>(initTodo);

  const dispatch = useDispatch();

  const changedTitle = (e: React.ChangeEvent<HTMLInputElement>) => {
    //左側の引数に対して、右側の値をマージする
    const newTodo = Object.assign({}, todo);
    newTodo.title = e.target.value;
    setTodo(newTodo);
  };

  const changedDescription = (e: React.ChangeEvent<HTMLTextAreaElement>) => {
    //左側の引数に対して、右側の値をマージする
    const newTodo = Object.assign({}, todo);
    newTodo.description = e.target.value;
    setTodo(newTodo);
  };

  const deleteClick = async () => {
    dispatch(deleteTodo(todo.id));
    router.push("/TodoList");
  };

  return (
    <div>
      <h1>Todo Edit</h1>
      <div className={styles.todoForm}>
        <input
          className={styles.todoTitleInput}
          value={todo.title}
          onChange={changedTitle}
        />
        <textarea
          className={styles.todoDescriptionInput}
          value={todo.description}
          onChange={changedDescription}
        />
        <button className={styles.backButton} onClick={() => router.back()}>
          back
        </button>
        <button className={styles.todoDeleteButton} onClick={deleteClick}>
          delete
        </button>
      </div>
    </div>
  );
};

export default TodoEdit;
