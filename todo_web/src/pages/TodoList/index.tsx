import { useDispatch, useSelector } from "react-redux";
import { RootState } from "../../app/store";
import { TodoItem } from "../../components/TodoItem";
import { useRouter } from "next/router";
import styles from "./TodoList.module.css";
import { useState } from "react";
import { Todo, initTodo } from "../../models/Todo";
import { addTodo } from "../../modules/TodosModule";

export const TodoList: React.FC = () => {
  const { todos } = useSelector((state: RootState) => state.todos);
  const [todo, setTodo] = useState<Todo>(initTodo);

  const router = useRouter();
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

  return (
    <>
      <h1>TodoList</h1>
      <div className={styles.todoForm}>
        <input className={styles.todoTitleInput} onChange={changedTitle} />
        <textarea
          className={styles.todoDescriptionInput}
          onChange={changedDescription}
        />
        <div>
          <button className={styles.backButton} onClick={() => router.back()}>
            back
          </button>
          <button
            className={styles.todoAddButton}
            onClick={() => {
              dispatch(addTodo(todo));
            }}
          >
            Add
          </button>
        </div>
      </div>
      {todos.map((todo) => {
        return (
          <TodoItem
            key={todo.id}
            todo={todo}
            onClick={() => {
              return router.push(`/TodoEdit/${todo.id}`);
            }}
          />
        );
      })}
    </>
  );
};

export default TodoList;
