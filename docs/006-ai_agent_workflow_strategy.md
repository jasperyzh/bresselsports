# AI Agent Workflow Plan & Strategy

This document outlines a pragmatic, agentic workflow for developing the BRESSEL™ WordPress framework, drawing heavily from the insights of Lucas Meijer (Ex-Unity) and Fabian Jakobs (Databricks) to ensure effective use of AI coding tools.

## Core Principles

1.  **Stop Chasing Tools; Start Solving Problems:** We will focus on pragmatism and getting features shipped rather than continuously evaluating new AI platforms or tools.
2.  **Make Your Codebase "Agent-Friendly":** Our repository is the environment (the "level") the AI operates in. We will keep it clean:
    *   Maintain accurate and up-to-date Markdown instructions.
    *   Silence noisy build/Docker warnings that might distract the agent.
3.  **Evaluate Before Execution:** Determine how the AI will prove its work *before* prompting.
4.  **Embrace HTML output for analysis:** Request deep-dives to be presented as HTML UI (slide decks) instead of dense terminal walls of text.

## Managing the Agent's "Amnesia" & Context

AI agents suffer from "amnesia" (context window limitations). We must actively manage this to prevent the agent from getting confused ("Vibe Coding").

1.  **Leave Breadcrumbs:** We use project documentation like `AGENTS.md` and this document to set the rules. These serve as the agent's initial memory state.
2.  **Actively Manage Context (`/clear`):**
    *   Do not treat the agent chat as an endless conversation.
    *   Aggressively clear context when moving to a new task or after a failed attempt.
3.  **The "Plan -> Clear -> Execute" Workflow:**
    *   Step 1: Ask the agent to plan the architecture/steps.
    *   Step 2: Save this plan to a markdown file (or our Backlog tool).
    *   Step 3: **Clear the agent's memory.**
    *   Step 4: Instruct the agent to read the plan and execute *only* the first step.
4.  **Time-Travel / Tree method:** If the agent spirals into a rabbit hole, don't argue with it. Roll back the context to before the mistake and re-prompt.

## Task Management (The Backlog.md CLI)

We do not rely on the agent's memory for multi-step tasks. We use the **Backlog.md CLI tool** as our rigid, trackable issue tracker.

*   Every feature/bug must be broken down into CLI tasks.
*   The agent uses the CLI to read tasks, update status, check acceptance criteria, and add implementation notes.
*   *Reference `AGENTS.md` for strict Backlog.md CLI usage rules.*

## Workflow Iteration Cycle (The Dual-Model Approach)

To maximize quality while keeping API costs low, we employ a **model-routing strategy** based on the complexity of the task:

*   **Gemini 3.1 Pro (The Planner & Evaluator):** Used for highly complex reasoning, reading visual mockups, drafting architecture into the Backlog, and performing the final visual evaluation (using browser-tools/MCP).
*   **MiniMax m2.7 (The Executor):** Used for raw code generation. Since the context is cleared and MiniMax is only fed a highly structured, rigid plan from the Backlog (written by Gemini), it can efficiently write the PHP/CSS/Tailwind at a fraction of the cost.

### The Step-by-Step Cycle:

1.  **Identify/Create Task (Gemini):** Use `backlog task create` or find an existing task.
2.  **Plan (Gemini):** Formulate an implementation plan and add it to the task via `backlog task edit <id> --plan "..."`. Check for required references/docs. **Run `/clear` and switch to MiniMax.**
3.  **Execute (MiniMax):**
    *   Read the Backlog task plan.
    *   Write the code (PHP, Tailwind).
    *   Append progress notes to the task: `--append-notes`.
    *   **Run `/clear` and switch back to Gemini.**
4.  **Evaluate & Verify (Gemini):**
    *   Use MCP browser tools to visually UI validate the work.
    *   Generate the HTML evaluation slide deck (Demand proof).
5.  **Finalize (Gemini):**
    *   Mark ACs as done: `--check-ac <index>`.
    *   Write a PR-style summary: `--final-summary "..."`.
    *   Mark task as Done: `-s Done`.
6.  **Debug Failures:** If an attempt fails, analyze the tool call logs. Feed the transcript back to the AI for self-correction recommendations, update project docs, clear context, and restart.
