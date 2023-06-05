import { useState } from "react";

function NewTask({ onAddTask }) {
  const [content, setContent] = useState("");

  const handleAddTask = () => {
    if (content.trim() !== "") {
      onAddTask(content);
      setContent("");
    }
  };

  const handleKeyPress = (event) => {
    if (event.key === "Enter") {
      handleAddTask();
    }
  };

  return (
    <div style={styles.newTaskContainer}>
      <input
        type="text"
        value={content}
        onChange={(event) => setContent(event.target.value)}
        onKeyPress={handleKeyPress}
        style={styles.newTaskInput}
      />
      <button onClick={handleAddTask} style={styles.newTaskButton}>
        Add Task
      </button>
    </div>
  );
}

const styles = {
  newTaskContainer: {
    display: "flex",
    alignItems: "center",
    marginTop: "10px",
  },
  newTaskInput: {
    flex: "1",
    marginRight: "5px",
    padding: "5px",
    fontSize: "16px",
  },
  newTaskButton: {
    padding: "5px 10px",
    fontSize: "16px",
    background: "#eee",
    border: "none",
    cursor: "pointer",
  },
};

export default NewTask;
