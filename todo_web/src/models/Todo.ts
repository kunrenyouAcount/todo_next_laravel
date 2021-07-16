export type Todo = {
  id?: number;
  title: string;
  description: string;
};

export const initTodo: Todo = {
  title: "",
  description: "",
};
