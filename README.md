flowchart TB

    %% CONTROL PLANE
    subgraph CP[CONTROL PLANE (Master)]
        APISERVER[API Server<br/>- Gateway for kubectl<br/>- Validates requests]
        ETCD[etcd<br/>- Key-value database<br/>- Stores desired state]
        SCHEDULER[Scheduler<br/>- Assigns Pods to Nodes]
        CONTROLLER[Controller Manager<br/>- Maintains desired vs actual state]
    end

    %% WORKER NODES
    subgraph WN[WORKER NODES]
        subgraph N1[Worker Node 1]
            KUBELET1[kubelet<br/>- Runs Pods<br/>- Talks to API server]
            PROXY1[kube-proxy<br/>- Networking rules]
            RUNTIME1[Container Runtime<br/>Docker/containerd]
            POD1[Pod<br/>Container(s)]
        end

        subgraph N2[Worker Node 2]
            KUBELET2[kubelet]
            PROXY2[kube-proxy]
            RUNTIME2[Container Runtime]
            POD2[Pod]
        end
    end

    %% CONNECTIONS

    APISERVER --> ETCD
    APISERVER --> SCHEDULER
    APISERVER --> CONTROLLER

    SCHEDULER --> KUBELET1
    SCHEDULER --> KUBELET2

    CONTROLLER --> KUBELET1
    CONTROLLER --> KUBELET2

    KUBELET1 --> RUNTIME1
    KUBELET2 --> RUNTIME2

    RUNTIME1 --> POD1
    RUNTIME2 --> POD2

    PROXY1 --> POD1
    PROXY2 --> POD2
