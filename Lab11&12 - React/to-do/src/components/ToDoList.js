import Task from "./Task";

function ToDoList({ tasks, onToggle }) {
  return (
    <div>
      {tasks.length === 0 ? (
        <p style={styles.emptyTasks}>Nothing to do...</p>
      ) : (
        tasks.map((task) => (
          <Task
            key={task.id}
            id={task.id}
            content={task.content}
            completed={task.completed}
            onToggle={onToggle}
          />
        ))
      )}
    </div>
  );
}

const styles = {
  emptyTasks: {
    fontStyle: "italic",
    color: "#888",
  }
};

export default ToDoList;
